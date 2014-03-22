<?php
namespace App\Modules\Admin\Seeds;

use Seeder, Sentry;


class SentryUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentry::getUserProvider()->create(array(
            'email'    => 'admin@admin.com',
            'password' => 'admin',
            'activated' => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email'    => 'user@user.com',
            'password' => 'user',
            'activated' => 1,
        ));
    }

}