<?php
namespace App\Modules\Levels\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator, File, DB,
    \App\Modules\Levels\Models\Level;

/**
 * Class AccountController
 *
 * @package App\Modules\Levels\Controllers
 */
class LevelController extends \BaseController
{
    public function index() {
        View::share('page_title', 'Levels list');
        $levels = Level::all();
        View::share('levels',$levels);
        return View::make('levels::admin.list');
    }

    public function getAddForm() {
        View::share('page_title', 'Levels list');
        return View::make('levels::admin.forms.add');
    }

    public function postAddForm() {
        $input = Input::all();
        $validator = Validator::make($input, array(
                'title' => 'required|max:255',
                'sort' => 'required|integer',
                '___' => 'required'
            )
        );
        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.level.add')->withInput();
        } else {
            $file = Input::file('___');
            //dd(Config::get('levels::paths.levels'));
            $file->move(Config::get('levels::paths.levels'), $file->getClientOriginalName());

            $level = new Level();
            $level->title = $input['title'];
            $level->sort = $input['sort'];
            $level->file = $file->getClientOriginalName();

            if ($level->save()) {
                Notification::success(trans('levels::admin.created'));
                return Redirect::route('admin.levels');
            }
        }
    }

    public function getEditForm($id) {
        View::share('page_title', 'Edit level');
        $level = Level::findOrFail($id);
        View::share('level', $level);
        return View::make('levels::admin.forms.edit');
    }

    public function postEditForm($id) {
        $level = Level::findOrFail($id);
        $input = Input::all();
        $validator = Validator::make($input, array(
                'title' => 'required|max:255',
                'sort' => 'required|integer',
            )
        );
        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.level.edit',array($id))->withInput();
        } else {
            $level->title = $input['title'];
            $level->sort = $input['sort'];
            $level->save();
            Notification::success(trans('levels::admin.saved'));
            return Redirect::route('admin.levels');
        }
    }

    public function getDelete($id) {
        $level = Level::findOrFail($id);
        $file = File::delete(Config::get('levels::paths.levels').$level->file);
        $level->delete();
        Notification::info(trans('levels::admin.deleted'));
        return Redirect::route('admin.levels');
    }

    public function userTop() {
        $users = DB::select(DB::raw('SELECT users.first_name, users.last_name, user, COUNT(level) AS levels, SUM(tries) AS tries FROM (
	                                    SELECT user, level, COUNT(*) AS tries
	                                    FROM logs
	                                    GROUP BY user, level
                                      ) a
                                      LEFT JOIN users ON a.user = users.id
                                      GROUP BY user
                                      ORDER BY levels DESC, tries ASC;'));
        View::share('top_users', $users);
        return View::make('levels::pages.usertop');
    }

}