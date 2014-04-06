<?php

class StudentGroup extends Eloquent {
    public function study() {
        return $this->belongsTo('Study');
    }

    public function lectures() {
        return $this->belongsToMany('Lecture','lecture_student_groups', 'student_group_id', 'lecture_id');
    }
}