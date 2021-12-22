<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(user_seed_info::class);
        $this->call(role_seed_info::class);
        $this->call(admin_role_info::class);

    }
}
