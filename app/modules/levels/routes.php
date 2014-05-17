<?php
View::share('assetDir', Config::get('admin::paths.assetDir'));

Route::group(array('prefix' => 'admin'), function () {
    Route::get('/levels.html',
        array(
            'uses' => 'App\Modules\Levels\Controllers\LevelController@index',
            'as' => 'admin.levels',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/levels-add.html',
        array(
            'uses' => 'App\Modules\Levels\Controllers\LevelController@getAddForm',
            'as' => 'admin.level.add',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/levels-add.html',
        array(
            'uses' => 'App\Modules\Levels\Controllers\LevelController@postAddForm',
            'as' => 'admin.level.add.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/levels-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Levels\Controllers\LevelController@getEditForm',
            'as' => 'admin.level.edit',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/levels-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Levels\Controllers\LevelController@postEditForm',
            'as' => 'admin.level.edit.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/levels-delete-{id}.html',
        array(
            'uses' => 'App\Modules\Levels\Controllers\LevelController@getDelete',
            'as' => 'admin.level.delete',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
});