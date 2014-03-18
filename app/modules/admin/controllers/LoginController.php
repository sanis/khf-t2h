<?php
namespace App\Modules\Admin\Controllers;

use View, Input, Response, User, Sentry, Notification, Redirect;

/**
 * Class LoginController
 *
 * @package App\Modules\Admin\Controllers
 */
class LoginController extends \BaseController
{

    public function __construct()
    {
        //Check CSRF token on POST
        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->beforeFilter('admin.loggedOut', array('except' => 'getLogoutPage'));
        $this->beforeFilter('admin.loggedIn', array('only' => 'getLogoutPage'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLoginForm()
    {
        View::share('page_title', trans('admin::login.login_title'));
        return View::make('admin::forms.login');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function postLoginForm()
    {
        Notification::success(array('Success message','test'));
        Notification::danger('error message');
        View::share('page_title', trans('admin::login.login_title'));
        return Redirect::route('admin.login')->withInput();
    }

    /**
     * @return string
     */
    public function getLogoutPage()
    {
        Sentry::logout();
        Notification::info('Logged out.');
        return Redirect::route('admin.login');
    }

    public function getRemindPasswordForm()
    {
        View::share('page_title', trans('admin::login.remind_title'));
        return View::make('admin::forms.remind');
    }

    public function postRemindPasswordForm()
    {
        View::share('page_title', trans('admin::login.remind_title'));
        Notification::success(array('Success message','test'));
        Notification::danger('error message');
        return Redirect::route('admin.remind')->withInput();
    }
}