<?php
namespace App\Modules\Levels\Models;

class Level extends \Eloquent {
    public $table = 'levels';

    public function suggestions() {
        return $this->hasMany('App\Modules\Suggestions\Models\Suggestion','level');
    }

}

