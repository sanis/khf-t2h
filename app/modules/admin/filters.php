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
        return Redirect::route('admin.login');
    }
});

// Checks if user is logged out
Route::filter('admin.loggedOut', function()
{
    if ( Sentry::check() ) {
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
            return Redirect::route('admin.login')->withErrors(array(trans('admin:user.noaccess')));
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        return Redirect::route('admin.login')->withErrors(array(trans('admin:user.notfound')));
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
            return Redirect::route('admin.login')->withErrors(array(trans('admin:user.noaccess')));
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        return Redirect::route('admin.login')->withErrors(array(trans('admin:user.notfound')));
    }

    catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
    {
        return Redirect::route('admin.login')->withErrors(array(trans('admin:user.group_notfound')));
    }
});