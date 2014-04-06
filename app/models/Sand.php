<?php

class Sand extends Eloquent {
    public function teacher() {
        return $this->belongsTo('Teacher');
    }
    public function subject() {
        return $this->belongsTo('Subject');
    }
    public function semester() {
        return $this->belongsTo('Semester');
    }
}