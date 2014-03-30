<?php
namespace App\Modules\Admin\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator;
use Whoops\Example\Exception;

/**
 * Class LoginController
 *
 * @package App\Modules\Admin\Controllers
 */
class UserController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function getUserList()
    {
        View::share('page_title', 'blah blah');
        $users = Sentry::findAllUsers();
        View::share('users', $users);
        return View::make('admin::pages.user.list');
    }

    /**
     * @param $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getUserDelete($userId)
    {
        if ((int)$userId != 1) {
            try {
                $user = Sentry::findUserById($userId);
            } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Notification::danger('User not found');
                return Redirect::route('admin.user.list');
            }
            //$user->delete();
            Notification::info('User deleted');
            return Redirect::route('admin.user.list');
        } else {
            Notification::danger('Can\'t delete main user sorry');
            return Redirect::route('admin.user.list');
        }
    }

    /**
     * @param $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getUserActivate($userId)
    {
        if ((int)$userId != 1) {
            try {
                $user = Sentry::findUserById($userId);
            } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Notification::danger('User not found');
                return Redirect::route('admin.user.list');
            }
            if (!$user->isActivated()) {
                $user->activate();
                Notification::info('User activated');
                return Redirect::route('admin.user.list');
            } else {
                $user->deactivate();
                Notification::info('User deactivated');
                return Redirect::route('admin.user.list');
            }
        } else {
            Notification::danger('Can\'t activate/deactivate main user sorry');
            return Redirect::route('admin.user.list');
        }
    }

    /**
     * @param $userId
     *
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function getUserEditForm($userId)
    {
        View::share('page_title', 'blah blah');
        if ((int)$userId != 1) {
            try {
                $user = Sentry::findUserById($userId);
            } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Notification::danger('User not found');
                return Redirect::route('admin.user.list');
            }
            $groups = $user->getGroups();
            foreach ($groups as $group) {
                $userGroups[] = $group->name;
            }
            $groups = Sentry::findAllGroups();
            View::share('groups', $groups);
            View::share('userGroups', $userGroups);
            View::share('userEditable', $user);
            return View::make('admin::forms.user.edit');
        } else {
            Notification::danger('Main user is not editable');
            return Redirect::route('admin.user.list');
        }
    }

    public function postUserEditForm($userId)
    {
        View::share('page_title', 'blah blah');
        if ((int)$userId != 1) {
            $validator = Validator::make(Input::all(), array(
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                    'email' => 'required|email|unique:users,email,' . $userId,
                    'password' => 'confirmed|min:3',
                    'groups' => 'required|array'
                )
            );

            if ($validator->fails()) {
                Notification::danger($validator->messages()->all());
                return Redirect::route('admin.user.edit', array($userId))->withInput(Input::except(array('password', 'password_confirmed')));
            } else {

                try {
                    $user = Sentry::findUserById($userId);
                } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                    Notification::danger('User not found');
                    return Redirect::route('admin.user.list');
                }

                // TODO: move to model.
                $groups = $user->getGroups();
                foreach ($groups as $group) {
                    $userGroups[] = $group->name;
                }
                $groups = Sentry::findAllGroups();
                foreach ($groups as $group) {
                    $groups[] = $group->name;
                }
                $inputGroups = Input::get('groups');

                foreach ($userGroups as $userGroup) {
                    if (!in_array($userGroup, $inputGroups) && in_array($userGroup, $groups)) {
                        $objectGroup = Sentry::findGroupByName($userGroup);
                        $user->removeGroup($objectGroup);
                    }
                }

                foreach ($inputGroups as $inputGroup) {
                    if (!in_array($inputGroup, $userGroups) && in_array($inputGroup, $groups)) {
                        $objectGroup = Sentry::findGroupByName($inputGroup);
                        $user->addGroup($objectGroup);
                    }
                }

                $user->email = Input::get('email');
                $user->first_name = Input::get('first_name');
                $user->last_name = Input::get('last_name');
                $user->activated = (bool)(Input::get('activated') == 1);
                if (!empty(Input::get('password'))) {
                    $user->password = Input::get('password');
                }

                $user->save();

                Notification::success(trans('admin::user.saved'));
                return Redirect::route('admin.user.edit', array($userId));
            }
        } else {
            Notification::danger('Main user is not editable');
            return Redirect::route('admin.user.list');
        }
    }

    public function getUserAddForm()
    {
        View::share('page_title', 'blah blah');

        $groups = Sentry::findAllGroups();
        View::share('groups', $groups);

        return View::make('admin::forms.user.add');
    }

    public function postUserAddForm()
    {
        View::share('page_title', 'blah blah');
        $validator = Validator::make(Input::all(),
            array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:3',
                'groups' => 'required|array'
            )
        );

        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.user.add')->withInput()->exceptInput(array('password', 'password_confirmed'));
        } else {
            try {
                $user = Sentry::createUser(array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                    'first_name' => Input::get('first_name'),
                    'last_name' => Input::get('last_name'),
                    'activated' => (Input::get('activated') == 1),
                ));

                if (is_array(Input::get('groups'))) {
                    foreach (Input::get('groups') as $groupInput) {
                        $group = Sentry::findGroupByName($groupInput);
                        $user->addGroup($group);
                    }
                }
            } catch (\Cartalyst\Sentry\Users\LoginRequiredException $e) {
                Notification::danger(trans('admin::user.login_field_required'));
                return Redirect::route('admin.user.add')->withInput()->exceptInput(array('password', 'password_confirmed'));
            } catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                Notification::danger(trans('admin::user.password_field_required'));
                return Redirect::route('admin.user.add')->withInput()->exceptInput(array('password', 'password_confirmed'));
            } catch (\Cartalyst\Sentry\Users\UserExistsException $e) {
                Notification::danger(trans('admin::user.already_esists'));
                return Redirect::route('admin.user.add')->withInput()->exceptInput(array('password', 'password_confirmed'));
            } catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                Notification::danger(trans('admin::user.group_not_found'));
                return Redirect::route('admin.user.add')->withInput()->exceptInput(array('password', 'password_confirmed'));
            }
            Notification::success(trans('admin::user.successfully_created'));
            return Redirect::route('admin.user.list');
        }
    }
}