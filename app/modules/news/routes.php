<?php

Route::group(array('prefix' => 'admin'), function () {
    View::share('assetDir', Config::get('admin::paths.assetDir'));
    Route::post('/news-categories-add.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsCategoryController@postNewsCategoryAddForm',
            'as' => 'admin.newsCategory.add.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/news-categories-add.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsCategoryController@getNewsCategoryAddForm',
            'as' => 'admin.newsCategory.add',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/news-categories.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsCategoryController@getNewsCategoryList',
            'as' => 'admin.newsCategory.list',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/news-categories.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsCategoryController@postNewsCategoryList',
            'as' => 'admin.newsCategory.list.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/news-categories-delete-{id}.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsCategoryController@getNewsCategoryDelete',
            'as' => 'admin.newsCategory.delete',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/news-categories-edit-{id}.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsCategoryController@getNewsCategoryEditForm',
            'as' => 'admin.newsCategory.edit',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/news-categories-edit-{id}.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsCategoryController@postNewsCategoryEditForm',
            'as' => 'admin.newsCategory.edit.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/news-add.html',
        array(
            'uses' => 'App\Modules\News\Controllers\NewsController@getNewsAddForm',
            'as' => 'admin.news.add',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    App::missing(function ($exception) {
        View::share('page_title', 'admin::errors.title_404');
        return Response::view('admin::errors.404', array(), 404);
    });
});