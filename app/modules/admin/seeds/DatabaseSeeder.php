<?php namespace App\Modules\Admin\Seeds;

use Eloquent,Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('App\Modules\Admin\Seeds\SentryGroupSeeder');
        $this->call('App\Modules\Admin\Seeds\SentryUserSeeder');
        $this->call('App\Modules\Admin\Seeds\SentryUserGroupSeeder');
    }

}