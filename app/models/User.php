<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Cartalyst\Sentry\Users\Eloquent\User {

	public function updateAccount($settings) {
        if(!empty($settings['password'])) {
            $this->password = Hash::make($settings['password']);
        }
        $this->first_name = $settings['first_name'];
        $this->last_name = $settings['last_name'];
        $this->email = $settings['email'];

        $this->save();
    }

}