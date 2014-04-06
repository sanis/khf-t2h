<?php

class Page extends Baum\Node {
    public function user() {
        return $this->belongsTo('User');
    }

    public function menus() {
        return $this->hasMany('Menu');
    }

    //TODO: submenu
    public function submenu() {
        return ;
    }
}