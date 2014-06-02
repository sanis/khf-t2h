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

    public static function addToLog($levelId, $user) {
        $log = new Log();
        $log->user = $user->id;
        $log->level = $levelId;
        
        $log->get = print_r($_GET,true);
        $log->post = print_r($_POST,true);
        $log->request = print_r($_REQUEST,true);
        $log->server = print_r($_SERVER,true);
        $log->cookie = print_r($_COOKIE,true);
        if (isset($_SESSION)) {
            $log->session = print_r($_SESSION,true);
        }

        $log->save();
    }
}

