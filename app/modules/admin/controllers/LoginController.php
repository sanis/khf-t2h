<?php
namespace App\Modules\Admin\Controllers;

use DaveJamesMiller\Breadcrumbs\Exception;
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
        $credentials = array(
            'email'=>Input::get('username'),
            'password'=>Input::get('password'),
        );
        $remember = (bool)Input::get('remember');
        $user = $this->_loginUser($credentials, $remember);
        if (is_object($user)) {
            echo 'LOGGED IN';
        } else {
            Notification::danger($user);
            View::share('page_title', trans('admin::login.login_title'));
            return Redirect::route('admin.login')->withInput();
        }
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

    private function _loginUser($credentials, $remember) {
        try {
            $user = Sentry::authenticate($credentials, $remember);
        } catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return trans('admin::login.login_required');
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return trans('admin::login.password_required');
        }
        catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            return trans('admin::login.wrong_password');
        }
        catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return trans('admin::login.user_not_found');
        }
        catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            return trans('admin::login.user_not_activated');
        }
        catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            return trans('admin::login.user_suspended');
        }
        catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            return trans('admin::login.user_banned');
        }
        try {
            $adminGroup = Sentry::findGroupByName('Admin');
            $user->inGroup($adminGroup);
        } catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            return trans('admin::login.not_admin');
        }
        return $user;
    }
}