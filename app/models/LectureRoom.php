<?php

class LectureRoom extends Eloquent {
    public function department() {
        return $this->belongsTo('Department');
    }

    public function lectures() {
        return $this->hasMany('Lecture');
    }
}