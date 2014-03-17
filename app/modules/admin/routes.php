<?php
View::share('assetDir', Config::get('admin::paths.assetDir'));

Route::group(array('prefix' => 'admin'), function () {
    Route::get('/login.html', array('uses' => 'App\Modules\Admin\Controllers\LoginController@getLoginForm', 'as' => 'admin.login'));
    Route::post('/login.html', array('uses' => 'App\Modules\Admin\Controllers\LoginController@postLoginForm', 'as' => 'admin.login.post'));
    Route::get('/logout.html', array('uses' => 'App\Modules\Admin\Controllers\LoginController@getLogoutPage', 'as' => 'admin.logout', 'before'=>'admin.loggedIn'));
    Route::get('/remind-password.html', array('uses' => 'App\Modules\Admin\Controllers\LoginController@getRemindPasswordFrom', 'as' => 'admin.remind', 'before'=>'!admin.loggedIn'));
    Route::post('/remind-password.html', array('uses' => 'App\Modules\Admin\Controllers\LoginController@postRemindPasswordForm', 'as' => 'admin.remind.post', 'before'=>'!admin.loggedIn'));

    Route::get('/', array('uses' => 'App\Modules\Admin\Controllers\DashboardController@getDashboardPage', 'as' => 'admin.dashboard', 'before' => 'admin.inGroup:Admins'));

    App::missing(function ($exception) {
        return Response::view('admin::errors.404', array(), 404);
    });
});