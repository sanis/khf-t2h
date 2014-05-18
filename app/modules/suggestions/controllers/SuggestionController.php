<?php
namespace App\Modules\Suggestions\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator, File,
    \App\Modules\Levels\Models\Level,
    \App\Modules\Suggestions\Models\Suggestion;

/**
 * Class SuggestionController
 *
 * @package App\Modules\Suggestions\Controllers
 */
class SuggestionController extends \BaseController
{
    public function index() {
        View::share('page_title', 'Suggestions list');
        $suggestions = Suggestion::with('levels')->get();
        View::share('suggestions',$suggestions);
        return View::make('suggestions::admin.list');
    }

    public function getAddForm() {
        View::share('page_title', 'Add new suggestion');
        View::share('levels', Level::all());
        return View::make('suggestions::admin.forms.add');
    }

    public function postAddForm() {
        $input = Input::all();
        $validator = Validator::make($input, array(
                'title' => 'required|max:255',
                'level' => 'required|integer',
                'text' => 'required'
            )
        );
        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.suggestion.add')->withInput();
        } else {
            $suggestion = new Suggestion();
            $suggestion->title = $input['title'];
            $suggestion->level = $input['level'];
            $suggestion->text = $input['text'];

            if ($suggestion->save()) {
                Notification::success(trans('suggestions::admin.created'));
                return Redirect::route('admin.suggestions');
            }
        }
    }

    public function getEditForm($id) {
        View::share('page_title', 'Edit suggestion');
        View::share('levels', Level::all());
        $suggestion = Suggestion::findOrFail($id);
        View::share('suggestion', $suggestion);
        return View::make('suggestions::admin.forms.edit');
    }

    public function postEditForm($id) {
        $suggestion = Suggestion::findOrFail($id);
        $input = Input::all();
        $validator = Validator::make($input, array(
                'title' => 'required|max:255',
                'level' => 'required|integer',
                'text' => 'required'
            )
        );
        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.suggestion.edit',array($id))->withInput();
        } else {
            $suggestion->title = $input['title'];
            $suggestion->level = $input['level'];
            $suggestion->text = $input['text'];
            $suggestion->save();
            Notification::success(trans('suggestions::admin.saved'));
            return Redirect::route('admin.suggestions');
        }
    }

    public function getDelete($id) {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->delete();
        Notification::info(trans('suggestions::admin.deleted'));
        return Redirect::route('admin.suggestions');
    }

}