<?php

namespace App\Modules\News\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator, NewsCategory;

class NewsController extends \BaseController
{
    public function getNewsAddForm() {
        View::share('page_title', 'Edit news category');
        $categories = NewsCategory::getNestedList('title', 'id', '-');
        View::share('categories', $categories);
        return View::make('news::admin.forms.news.add');
    }
}