<?php

class Study extends Eloquent {
    public function department() {
        return $this->belongsTo('Department');
    }

    public function studentGroups() {
        return $this->hasMany('StudentGroup');
    }
}