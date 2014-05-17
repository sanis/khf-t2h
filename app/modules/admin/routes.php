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

    Route::get('/users-add.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getUserAddForm',
            'as' => 'admin.user.add',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/users-add.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@postUserAddForm',
            'as' => 'admin.user.add.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/users-delete-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getUserDelete',
            'as' => 'admin.user.delete',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/users-activate-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getUserActivate',
            'as' => 'admin.user.activate',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/users-deactivate-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getUserActivate',
            'as' => 'admin.user.deactivate',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/users-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@getUserEditForm',
            'as' => 'admin.user.edit',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::post('/users-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\UserController@postUserEditForm',
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

    Route::get('/groups.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\GroupController@getGroupList',
            'as' => 'admin.group.list',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/groups-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\GroupController@getGroupEditForm',
            'as' => 'admin.group.edit',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::post('/groups-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\GroupController@postGroupEditForm',
            'as' => 'admin.group.edit.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/groups-delete-{id}.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\GroupController@getGroupDelete',
            'as' => 'admin.group.delete',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/groups-add.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\GroupController@getGroupAddForm',
            'as' => 'admin.group.add',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/groups-add.html',
        array(
            'uses' => 'App\Modules\Admin\Controllers\GroupController@postGroupAddForm',
            'as' => 'admin.group.add.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    App::missing(function ($exception) {
        View::share('page_title', 'admin::errors.title_404');
        return Response::view('admin::errors.404', array(), 404);
    });
});

$levels = App\Modules\Levels\Models\Level::all();
foreach ($levels as $level) {
    Route::any($level->file, function() use ($level) {
        return View::make('levels::levels.'.str_replace('.php','',$level->file));
    });
}