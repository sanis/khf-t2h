<?php

class Lecture extends Eloquent {

    public function lectureRoom()
    {
        return $this->belongsTo('LectureRoom');
    }

    public function subject()
    {
        return $this->belongsTo('Subject');
    }

    public function semester()
    {
        return $this->belongsTo('Semester');
    }

    public function teacher()
    {
        return $this->belongsTo('Teacher');
    }

    public function studentGroups()
    {
        return $this->belongsToMany('StudentGroup', 'lecture_student_groups', 'lecture_id', 'student_group_id');
    }



}