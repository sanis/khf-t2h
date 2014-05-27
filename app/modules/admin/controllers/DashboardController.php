<?php

namespace App\Modules\Admin\Controllers;

use View, Input, Response, User, Sentry, DB;

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
        $users = DB::select(DB::raw('SELECT users.first_name, users.last_name, user, COUNT(level) AS levels, SUM(tries) AS tries FROM (
	                                    SELECT user, level, COUNT(*) AS tries
	                                    FROM logs
	                                    GROUP BY user, level
                                      ) a
                                      LEFT JOIN users ON a.user = users.id
                                      GROUP BY user
                                      ORDER BY levels DESC, tries ASC;'));
        View::share('top_users', $users);

        return View::make('admin::pages.dashboard');
    }
}