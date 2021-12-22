<?php

use Illuminate\Database\Seeder;

class role_seed_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        
        $roles = array(
            array('id'=> 1, 'name' => 'admin', 'guard_name' => 'web', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ),
            array('id'=> 2, 'name' => 'Sales Manager', 'guard_name' => 'web', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ),
            array('id'=> 3, 'name' => 'General Manager', 'guard_name' => 'web', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ),    
            array('id'=> 4, 'name' => 'Shop Manager', 'guard_name' => 'web', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ),  
            array('id'=> 5, 'name' => 'Marketing Manager', 'guard_name' => 'web', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now() ),
        );

        DB::table('roles')->insert($roles);
    }
}
