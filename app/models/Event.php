<?php

class Event extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }



}