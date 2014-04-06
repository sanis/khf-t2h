<?php

class NewsCategory extends Baum\Node {

    public $timestamps = false;

    public static $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    public function news() {
        return $this->hasMany('News');
    }

}