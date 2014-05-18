<?php
Route::group(array('prefix' => 'admin'), function () {
    Route::get('/suggestions.html',
        array(
            'uses' => 'App\Modules\Suggestions\Controllers\SuggestionController@index',
            'as' => 'admin.suggestions',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/suggestions-add.html',
        array(
            'uses' => 'App\Modules\Suggestions\Controllers\SuggestionController@getAddForm',
            'as' => 'admin.suggestion.add',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/suggestions-add.html',
        array(
            'uses' => 'App\Modules\Suggestions\Controllers\SuggestionController@postAddForm',
            'as' => 'admin.suggestion.add.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/suggestions-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Suggestions\Controllers\SuggestionController@getEditForm',
            'as' => 'admin.suggestion.edit',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::post('/suggestions-edit-{id}.html',
        array(
            'uses' => 'App\Modules\Suggestions\Controllers\SuggestionController@postEditForm',
            'as' => 'admin.suggestion.edit.post',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );

    Route::get('/suggestions-delete-{id}.html',
        array(
            'uses' => 'App\Modules\Suggestions\Controllers\SuggestionController@getDelete',
            'as' => 'admin.suggestion.delete',
            'before'=>'admin.loggedIn|admin.inGroup:Admins'
        )
    );
});