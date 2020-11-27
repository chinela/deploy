<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Samuel',
            'email' => 'sammy@gmail.com',
            'password' => bcrypt('mmmm')
        ]);
        User::create([
            'name' => 'David',
            'email' => 'david@gmail.com',
            'password' => bcrypt('mmmm')
        ]);
    }
}
