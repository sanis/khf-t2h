<?php
namespace App\Modules\Admin\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator;

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
    public function getUserList() {
        View::share('page_title', 'blah blah');
        $users = Sentry::findAllUsers();
        View::share('users',$users);
        return View::make('admin::pages.user.list');
    }

    /**
     * @param $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getUserDelete($userId) {
        if ((int)$userId!=1) {
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
    public function getUserActivate($userId) {
        if ((int)$userId!=1) {
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
    public function getUserEditForm($userId) {
        if ((int)$userId!=1) {
            try {
                $user = Sentry::findUserById($userId);
            } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Notification::danger('User not found');
                return Redirect::route('admin.user.list');
            }
            return 'edit '.$user->email;
        } else {
            Notification::danger('Main user is not editable');
            return Redirect::route('admin.user.list');
        }
    }
}