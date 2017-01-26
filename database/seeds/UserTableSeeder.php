<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); // solo llena con x cantidad, no permite mas entrada de datos

        factory(User::class)->create([
            'first_name' => 'Gregory',
            'last_name' => 'Sanchez',
            'username' => 'mcgregox',
            'email' => 'mcgregox@gmail.com',
            'role' => 'admin',
            'active' => true,
            'password' => bcrypt('123456')
        ]);

        factory(User::class,49)->create();
    }
}
