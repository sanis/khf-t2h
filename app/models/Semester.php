<?php

class Semester extends Eloquent {
    public function lectures() {
        return $this->hasMany('Lecture');
    }

    public function sands() {
        return $this->hasMany('Sand');
    }
}