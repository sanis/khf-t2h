<?php
/**
 * Created by PhpStorm.
 * User: sanis
 * Date: 3/17/14
 * Time: 9:15 PM
 */

// Checks if user is logged in
Route::filter('admin.loggedIn', function()
{
    if ( ! Sentry::check() ) {
        Notification::danger(trans('admin::user.not_logged_in'));
        return Redirect::route('admin.login');
    }
});

// Checks if user is logged out
Route::filter('admin.loggedOut', function()
{
    if ( Sentry::check() ) {
        Notification::danger(trans('admin::user.not_for_logged_in'));
        return Redirect::route('admin.dashboard');
    }
});

// Checks if user has access
Route::filter('admin.hasAccess', function($route, $request, $value)
{
    try
    {
        $user = Sentry::getUser();
        if( ! $user->hasAccess($value))
        {
            Notification::danger(trans('admin::user.no_access'));
            return Redirect::route('admin.login');
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        Notification::danger(trans('admin::user.not_found'));
        return Redirect::route('admin.login');
    }

});

// checks in user in group
Route::filter('admin.inGroup', function($route, $request, $value)
{
    try
    {
        $user = Sentry::getUser();
        $group = Sentry::findGroupByName($value);
        if( ! $user->inGroup($group))
        {
            Sentry::logout();
            Notification::danger(trans('admin::user.no_access'));
            return Redirect::route('admin.login');
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        Notification::danger(trans('admin::user.not_found'));
        return Redirect::route('admin.login');
    }

    catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
    {
        Notification::danger(trans('admin::user.group_not_found'));
        return Redirect::route('admin.login');
    }
});