<?php
namespace App\Modules\Admin\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator;

/**
 * Class LoginController
 *
 * @package App\Modules\Admin\Controllers
 */
class GroupController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function getGroupList()
    {
        View::share('page_title', 'blah blah');
        $groups = Sentry::findAllGroups();
        View::share('groups', $groups);
        return View::make('admin::pages.group.list');
    }

    /**
     * @param $groupId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getGroupDelete($groupId)
    {
        if ((int)$groupId != 2) {
            try {
                $group = Sentry::findGroupById($groupId);
            } catch (\Cartalyst\Sentry\Users\GroupNotFoundException $e) {
                Notification::danger('Group not found');
                return Redirect::route('admin.group.list');
            }
            $group->delete();
            Notification::info(trans('admin::group.sucessfully deleted.'));
            return Redirect::route('admin.group.list');
        } else {
            Notification::danger('Can\'t delete main user group sorry');
            return Redirect::route('admin.group.list');
        }
    }

    /**
     * @param $userId
     *
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function getGroupEditForm($groupId)
    {
        View::share('page_title', 'blah blah');

        try {
            $group = Sentry::findGroupById($groupId);
        } catch (\Cartalyst\Sentry\Users\GroupNotFoundException $e) {
            Notification::danger('Group not found');
            return Redirect::route('admin.group.list');
        }
        View::share('group', $group);
        View::share('permissions', $group->getPermissions());
        View::share('groups', Sentry::findAllGroups());
        return View::make('admin::forms.group.edit');

    }

    public function postGroupEditForm($groupId)
    {

        $validator = Validator::make(
            Input::all(),
            array(
                'groupId' => 'required|integer|exists:groups,id',
                'permissions' => 'array'
            )
        );

        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.group.edit', array($groupId))->withInput();
        } else {
            try {
                $group = Sentry::findGroupById($groupId);
            } catch (\Cartalyst\Sentry\Users\GroupNotFoundException $e) {
                Notification::danger('Group not found');
                return Redirect::route('admin.group.list');
            }
            if (count(Input::get('permissions')) > 0) {
                foreach (Input::get('permissions') as $permission) {
                    $permissions[$permission] = 1;
                }
            }
            $permissions[strtolower($group->getName())] = 1;

            $userGroups = Sentry::findAllGroups();

            foreach ($userGroups as $userGroup) {
                if (!array_key_exists(strtolower($userGroup->name), $permissions)) {
                    $permissions[strtolower($userGroup->name)] = 0;
                }
            }
            $group->permissions = $permissions;

            if ($group->save()) {
                Notification::success(trans('admin::group.saved'));
                return Redirect::route('admin.group.edit', array($groupId));
            } else {
                Notification::danger(trans('admin::group.not_saved'));

                return Redirect::route('admin.group.edit', array($groupId));
            }
        }
    }

    public function postGroupAddForm()
    {
        $validator = Validator::make(
            Input::all(),
            array(
                'name' => 'required|unique:groups,name',
                'permissions' => 'array'
            )
        );

        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.group.add')->withInput();
        } else {

            foreach (Input::get('permissions') as $permission) {
                $permissions[$permission] = 1;
            }

            $permissions[strtolower(Input::get('name'))] = 1;

            $groupInfo = array(
                'name' => Input::get('name'),
                'permissions' => $permissions,
            );

            Sentry::getGroupProvider()->create($groupInfo);

            Notification::success(trans('admin::group.successfully_added'));
            return Redirect::route('admin.group.list');
        }
    }

    public function getGroupAddForm()
    {
        View::share('page_title', 'blah blah');
        $groups = Sentry::findAllGroups();
        View::share('groups', $groups);
        return View::make('admin::forms.group.add');
    }
}