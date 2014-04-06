<?php

class Subject extends Eloquent {
    public function teachers() {
        return $this->belongsToMany('Teacher', 'subjects_teachers', 'subject_id', 'teacher_id');
    }
    public function lectures() {
        return $this->hasMany('Lecture');
    }
    public function sands() {
        return $this->hasMany('Sand');
    }
}