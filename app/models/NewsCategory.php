<?php

class NewsCategory extends Baum\Node {

    public function news() {
        return $this->hasMany('News');
    }

}