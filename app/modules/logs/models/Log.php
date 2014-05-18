<?php
namespace App\Modules\Logs\Models;

class Log extends \Eloquent {
    public $table = 'logs';

    public function users() {
        return $this->belongsTo('User','user');
    }

    public function levels() {
        return $this->belongsTo('App\Modules\Levels\Models\Level', 'level');
    }

}

