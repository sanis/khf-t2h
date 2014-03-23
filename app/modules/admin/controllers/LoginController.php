<?php
namespace App\Modules\Admin\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator;

/**
 * Class LoginController
 *
 * @package App\Modules\Admin\Controllers
 */
class LoginController extends \BaseController
{

    /**
     *
     */
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
        $validator = Validator::make(
            Input::all(),
            array(
                'email' => 'required|email',
                'password' => 'required|min:3',
            )
        );
        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.login')->withInput()->exceptInput('password');
        }
        $credentials = array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password'),
        );
        $remember = (bool)Input::get('remember');
        $user = $this->_loginUser($credentials, $remember);
        if (is_object($user)) {
            Notification::success(trans('admin::login.success_login'));
            return Redirect::route('admin.dashboard');
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

    /**
     * @param null $resetCode
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getRemindPasswordForm($resetCode = null)
    {
        View::share('page_title', trans('admin::login.remind_title'));
        if ($resetCode == null) {
            return View::make('admin::forms.remind');
        } else {
            try {
                $user = Sentry::findUserByResetPasswordCode($resetCode);
                $adminGroup = Sentry::findGroupByName('Admins');
            } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Notification::danger(trans('admin::login.user_not_found'));
                return Redirect::route('admin.remind');
            }
            if ($user->inGroup($adminGroup)) {
                return View::make('admin::forms.remind2')->with('resetCode',$resetCode);
            } else {
                Notification::danger(trans('admin::login.not_admin'));
                return Redirect::route('admin.remind');
            }
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRemindPasswordForm()
    {
        View::share('page_title', trans('admin::login.remind_title'));
        $resetCode = Input::get('resetCode');
        if (!empty($resetCode)) {
            $validator = Validator::make(
                Input::all(),
                array(
                    'resetCode' => 'required',
                    'password' => 'required|confirmed|min:3'
                )
            );
            if ($validator->fails()) {
                Notification::danger($validator->messages()->all());
                return Redirect::route('admin.remind2',array('resetCode'=>$resetCode));
            }
            $password = Input::get('password');
            try {
                $user = Sentry::findUserByResetPasswordCode($resetCode);
                $adminGroup = Sentry::findGroupByName('Admins');
            } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Notification::danger(trans('admin::login.reset_not_found'));
                return Redirect::route('admin.login');
            }
            if ($user->inGroup($adminGroup)) {
               if ($user->attemptResetPassword($resetCode, $password)) {
                   Notification::success(trans('admin::login.password_changed'));
                   return Redirect::route('admin.login');
                } else {
                   Notification::danger(trans('admin::login.error_reset'));
                   return Redirect::route('admin.login');
               }
            } else {
                Notification::danger(trans('admin::login.only_admins_password'));
                return Redirect::route('admin.login');
            }

        } else {
            $validator = Validator::make(
                Input::all(),
                array(
                    'email' => 'required|email'
                )
            );
            if ($validator->fails()) {
                Notification::danger($validator->messages()->all());
                return Redirect::route('admin.remind')->withInput();
            }
            $email = Input::get('email');
            try {
                $user = Sentry::findUserByLogin($email);
                $adminGroup = Sentry::findGroupByName('Admins');
            } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Notification::danger(trans('admin::login.user_not_found'));
                return Redirect::route('admin.remind')->withInput();
            }
            if ($user->inGroup($adminGroup)) {
                $this->_sendPasswordReset($user);
                Notification::success(trans('admin::login.password_reset_send'));
                return Redirect::route('admin.login')->withInput();
            } else {
                Notification::danger(trans('admin::login.only_admins_password'));
                return Redirect::route('admin.login');
            }
        }
    }

    private function _sendPasswordReset($user) {
        $resetCode = $user->getResetPasswordCode();
        $resetLink = URL::route('admin.remind2', array('resetCode'=>$resetCode));
        Mail::queue('admin::emails.remind', array('resetLink'=>$resetLink), function($message) use ($user)
        {
            $email = $user->email;
            $subject = trans('admin::login.password_reset_email_subject');
            $from = Config::get('app.email');
            $message->from($from)->to($email)->subject($subject);
        });
    }

    /**
     * @param $credentials
     * @param $remember
     *
     * @return \Cartalyst\Sentry\Users\UserInterface|string
     */
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
        $adminGroup = Sentry::findGroupByName('Admins');
        if ($user->inGroup($adminGroup)){
            return $user;
        } else {
            return trans('admin::login.not_admin');
        }
    }
}