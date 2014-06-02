<?php
Route::group(array('prefix' => 'admin'), function () {
    Route::get('/logs.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@index',
            'as' => 'admin.logs',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/user-logs-{id}.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@indexByUser',
            'as' => 'admin.logsByUser',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/level-logs-{id}.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@indexByLevel',
            'as' => 'admin.logsByLevel',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/delete-log-{id}.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@delete',
            'as' => 'admin.log.delete',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/delete-user-logs-{id}.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@deleteByUser',
            'as' => 'admin.log.deleteByUser',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/delete-level-logs-{id}.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@deleteByLevel',
            'as' => 'admin.log.deleteByLevel',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
    Route::get('/delete-logs.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@deleteAll',
            'as' => 'admin.log.deleteAll',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/log-{id}.html',
        array(
            'uses' => 'App\Modules\Logs\Controllers\LogController@view',
            'as' => 'admin.log.view',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

});