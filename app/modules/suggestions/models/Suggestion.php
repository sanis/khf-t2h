<?php
namespace App\Modules\Suggestions\Models;

class Suggestion extends \Eloquent {
    public $table = 'suggestions';

    public function levels() {
        return $this->belongsTo('App\Modules\Levels\Models\Level','level');
    }


}

