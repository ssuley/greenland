<?php

use Illuminate\Database\Seeder;

class rate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('rates')->delete();
        
        $roles = array(
            array('rate'=> 2300),
            
        );

        DB::table('rates')->insert($roles);
    }
}
