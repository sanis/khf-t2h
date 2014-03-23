<?php

namespace App\Modules\Admin\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator;

/**
 * Class AccountController
 *
 * @package App\Modules\Admin\Controllers
 */
class AccountController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function getAccountForm() {
        View::share('page_title', trans('admin::account.edit_settings'));
        return View::make('admin::forms.account');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAccountForm() {
        View::share('page_title', trans('admin::account.edit_settings'));
        $user = View::shared('user');
        $validator = Validator::make(
            Input::all(),
            array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'password' => 'confirmed|min:3',
            )
        );
        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.account')->withInput()->exceptInput(array('password','password_confirmed'));
        } else {
            $user->updateAccount(Input::all());
            Notification::success(trans('admin::account.successfuly_updated'));
            return Redirect::route('admin.account');
        }
    }

}