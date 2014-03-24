<?php
View::share('assetDir', Config::get('admin::paths.assetDir'));

Route::group(array('prefix' => 'admin'), function () {
    Route::get('/login.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\LoginController@getLoginForm',
            'as' => 'admin.login'
        )
    );
    Route::post('/login.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\LoginController@postLoginForm',
            'as' => 'admin.login.post'
        )
    );
    Route::get('/logout.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\LoginController@getLogoutPage',
            'as' => 'admin.logout',
            'before'=>'admin.loggedIn'
        )
    );
    Route::get('/remind-password.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\LoginController@getRemindPasswordForm',
            'as' => 'admin.remind',
            'before'=>'admin.loggedOut'
        )
    );
    Route::post('/remind-password.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\LoginController@postRemindPasswordForm',
            'as' => 'admin.remind.post',
            'before'=>'admin.loggedOut'
        )
    );
    Route::get('/remind-password-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\LoginController@getRemindPasswordForm',
            'as' => 'admin.remind2',
            'before'=>'admin.loggedOut'
        )
    );

    Route::get('/account.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\AccountController@getAccountForm',
            'as' => 'admin.account',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::post('/account.html',
        array('uses' => 'App\Modules\Admin\Controllers\AccountController@postAccountForm',
            'as' => 'admin.account.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/users.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getUserList',
            'as' => 'admin.user.list',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/users-delete-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getDeleteUser',
            'as' => 'admin.user.delete',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/users-activate-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getActivateUser',
            'as' => 'admin.user.activate',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/users-deactivate-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getActivateUser',
            'as' => 'admin.user.deactivate',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/users-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getEditUserForm',
            'as' => 'admin.user.edit',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::post('/users-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getEditUserForm',
            'as' => 'admin.user.edit.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/',
        array(
            'uses' => 'App\Modules\Admin\Controllers\DashboardController@getDashboardPage',
            'as' => 'admin.dashboard',
            'before' => 'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    App::missing(function ($exception) {
        View::share('page_title', 'admin::errors.title_404');
        return Response::view('admin::errors.404', array(), 404);
    });
});