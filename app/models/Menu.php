<?php

class Menu extends Baum\Node {
    // TODO: Need to solve this shit
    public function subMenu() {
        return $this->hasMany('Menu','parent_id','id');
    }

    public function page() {
        return $this->belongsTo('Page');
    }

}