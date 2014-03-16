<?php
namespace App\Modules\Admin\Controllers;

use View, Input, Response, User, Sentry;

/**
 * Class LoginController
 *
 * @package App\Modules\Admin\Controllers
 */
class LoginController extends \BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function getLoginForm()
    {
        return View::make('admin::layouts.login');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function postLoginForm()
    {
        return View::make('admin::layouts.login');
    }

    /**
     * @return string
     */
    public function getLogoutPage()
    {
        Sentry::logout();
        return 'logged out';
    }

    public function getRemindPasswordFrom()
    {
        return 'remind';
    }

    public function postRemindPasswordFrom()
    {
        return 'post remind';
    }
}