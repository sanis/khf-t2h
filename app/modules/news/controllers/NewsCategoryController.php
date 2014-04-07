<?php

namespace App\Modules\News\Controllers;

use View, Input, Config, Sentry, Notification, Redirect, Mail, URL, Validator, NewsCategory;

/**
 * Class NewsCategoryController
 *
 * @package App\Modules\News\Controllers
 */
class NewsCategoryController extends \BaseController
{

    public function getNewsCategoryEditForm($categoryId) {
        $category = NewsCategory::findOrFail($categoryId);
        View::share('page_title', 'Edit news category');
        View::share('category_info', $category);
        return View::make('news::admin.forms.category.edit');
    }

    public function postNewsCategoryEditForm($categoryId) {

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postNewsCategoryAddForm()
    {
        $validator = Validator::make(Input::all(), array(
                'title'=>'required',
                'parentId'=>'integer|exists:news_categories,id'
            )
        );

        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.newsCategory.add')->withInput();
        } else {
            $category = NewsCategory::create(array(
                'title'=>Input::get('title')
            ));

            if (!empty(Input::get('parentId'))) {
                $mainCategory = NewsCategory::find(Input::get('parentId'));
                $category->makeChildOf($mainCategory);
            }

            Notification::success('Successfully added category.');
            return Redirect::route('admin.newsCategory.list');
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getNewsCategoryAddForm()
    {
        View::share('page_title', 'blah blah');
        $categories = NewsCategory::getNestedList('title', 'id', '-');
        View::share('categories', $categories);
        return View::make('news::admin.forms.category.add');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getNewsCategoryList()
    {
        View::share('page_title', 'blah blah');
        $categories = NewsCategory::all()->toHierarchy()->toArray();
        $categories = $this->_MakeTree($categories);
        View::share('categories', $categories);
        return View::make('news::admin.forms.category.list');
    }

    //TODO: move to model. No such a big logic in controller.

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postNewsCategoryList()
    {
        $validator = Validator::make(Input::all(), array(
            'nestable_list' => 'required',
        ));
        if ($validator->fails()) {
            Notification::danger($validator->messages()->all());
            return Redirect::route('admin.newsCategory.list');
        } else {
            View::share('page_title', 'blah blah');
            $categories = json_decode(Input::get('nestable_list'));
            if ($categories == NULL || $categories === FALSE) {
                Notification::danger('Sorry can\'t parse your list.');
                return Redirect::route('admin.newsCategory.list');
            } else {
                $root = null;
                $orderId = 0;
                foreach ($categories as $category) {
                    $oldRoot = $root;
                    $root = NewsCategory::find($category->id);
                    if (!$root->isRoot()) {
                        $root->makeRoot();
                        $orderId++;
                    }
                    if ($oldRoot != NULL) $root->makeSiblingOf($oldRoot);
                    if (isset($category->children)) {
                        $this->_putIntoChilds($root, $category->children);
                    }
                }
                Notification::success('Updated category tree.');
                return Redirect::route('admin.newsCategory.list');
            }
        }
    }

    /**
     * Puts into child of root
     *
     * @param $root
     * @param $childs
     */
    private function _putIntoChilds($root,$childs) {
        foreach ($childs as $children) {
            $childrenCategory = NewsCategory::find($children->id);
            $childrenCategory->makeChildOf($root);
            if (isset($children->children)) {
                $this->_putIntoChilds($childrenCategory,$children->children);
            }
        }
    }    /**
     * Makes a category tree
     *
     * @param $categories
     *
     * @return string
     */
    private function _makeTree($categories)
    {
        $return = '<ol class="dd-list">';
        foreach ($categories as $category) {
            $return .= "<li class=\"dd-item\" data-id=\"{$category['id']}\">";
            $return .= "<div class=\"dd-handle\">{$category['title']} <span class=\"pull-right\" style=\"margin-top: -2px;\"><a href=\"#\" class=\"btn btn-info btn-xs\">Edit</a> <a href=\"#\" class=\"btn btn-danger btn-xs\">Delete</a></span></div>";
            if (isset($category['children']) && count($category['children']) > 0) {
                $return .= $this->_MakeTree($category['children']);
            }
            $return .= '</li>';
        }
        $return .= '</ol>';
        return $return;
    }
}