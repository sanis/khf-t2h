<?php
namespace App\Modules\Logs\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator, File, User,
    \App\Modules\Levels\Models\Level,
    \App\Modules\Logs\Models\Log;

/**
 * Class LogController
 *
 * @package App\Modules\Logs\Controllers
 */
class LogController extends \BaseController
{
    public function index() {
        $logs = Log::with(array('levels','users'))->get();
        View::share('page_title','Logs list');
        View::share('logs',$logs);
        return View::make('logs::admin.list');
    }

    public function indexByUser($id) {
        $logs = Log::with(array('levels','users'))->where('user','=',$id)->get();
        View::share('deleteUser',$id);
        View::share('page_title','Logs list by user');
        View::share('logs',$logs);
        return View::make('logs::admin.list');
    }

    public function indexByLevel($id) {
        $logs = Log::with(array('levels','users'))->where('level','=',$id)->get();
        View::share('deleteLevel',$id);
        View::share('page_title','Logs list by level');
        View::share('logs',$logs);
        return View::make('logs::admin.list');
    }

    public function view($id) {
        $log = Log::with('levels','users')->findOrFail($id);
        View::share('page_title','View log');
        View::share('log',$log);
        return View::make('logs::admin.view');
    }

    public function delete($id) {
        $log = Log::findOrFail($id);
        $log->delete();
        Notification::success(trans('logs::admin.deleted'));
        return Redirect::route('admin.logs');
    }

    public function deleteByUser($id) {
        $logs = Log::where('user', '=', $id)->delete();
        Notification::success(trans('logs::admin.cleared'));
        return Redirect::route('admin.logs');
    }

    public function deleteByLevel($id) {
        $logs = Log::where('level', '=', $id)->delete();
        Notification::success(trans('logs::admin.cleared'));
        return Redirect::route('admin.logs');
    }
    public function deleteAll() {
        $logs = Log::all();
        foreach ($logs as $log) {
            $log->delete();
        }
        Notification::success(trans('logs::admin.cleared'));
        return Redirect::route('admin.logs');
    }



}