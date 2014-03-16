<?php
View::share('assetDir', Config::get('admin::paths.assetDir'));

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/login.html', function()
    {
        return View::make('admin::layouts.login');
    });

    App::missing(function($exception)
    {
        return Response::view('admin::errors.404', array(), 404);
    });
});