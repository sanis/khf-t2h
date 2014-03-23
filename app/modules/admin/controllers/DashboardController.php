<?php

namespace App\Modules\Admin\Controllers;

use View, Input, Response, User, Sentry;

/**
 * Class DashboardController
 *
 * @category Test
 * @package  App\Modules\Admin\Controllers
 * @author   Justinas Bolys <justinas.bolys@gmail.com>
 * @link     http://sanis.lt
 *
 * @license  GPL http://sanis.lt/gpl.html
 */
class DashboardController extends \BaseController
{

    public function __construct()
    {
        //Check CSRF token on POST
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * test
     *
     * @return string
     */
    public function getDashboardPage()
    {
        View::share('page_title', trans('admin::dashboard.page_title'));
        return View::make('admin::pages.dashboard');
    }
}