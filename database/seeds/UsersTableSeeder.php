<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'jill@harvard.edu',
            'first_name' => 'Jill',
            'last_name' => 'Harvard',
            'password' => Hash::make('helloworld')
        ]);

        $user = User::firstOrCreate([
            'email' => 'jamal@harvard.edu',
            'first_name' => 'Jamal',
            'last_name' => 'Harvard',
            'password' => Hash::make('helloworld')
        ]);
    }
}
