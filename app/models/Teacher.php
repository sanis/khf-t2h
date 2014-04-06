<?php

class Teacher extends Eloquent {
    public function department() {
        return $this->belongsTo('Department');
    }
    public function user() {
        return $this->belongsTo('User');
    }
    public function subjects() {
        return $this->belongsToMany('Subject', 'subjects_teachers', 'teacher_id', 'subject_id');
    }
    public function lectures() {
        return $this->hasMany('Lecture');
    }
    public function sands() {
        return $this->hasMany('Sand');
    }
}