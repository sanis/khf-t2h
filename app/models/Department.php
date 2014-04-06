<?php

class Department extends Eloquent
{
    public function studies()
    {
        return $this->hasMany('Study');
    }

    public function teachers()
    {
        return $this->hasMany('Teacher');
    }

    public function lectureRooms()
    {
        return $this->hasMany('LectureRoom');
    }
}