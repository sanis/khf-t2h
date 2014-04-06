<?php

class News extends Eloquent {
    public function user() {
        return $this->belongsTo('User');
    }
    public function category() {
        return $this->belongsTo('NewsCategory');
    }
}