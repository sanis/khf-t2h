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

    /**
     * test
     *
     * @return string
     */
    public function getDashboardPage()
    {
        return 'ok show dashboard';
    }
}