<?php

use Illuminate\Database\Seeder;

class admin_role_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('model_has_roles')->delete();

        $admin_role = [
            [
                'role_id' => 1, 'model_type' => 'App\User', 'model_id' => 1
            ]
        ];

        DB::table('model_has_roles')->insert($admin_role);
    }
}
