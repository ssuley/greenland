<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user_seed_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $admin = User::create([
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
