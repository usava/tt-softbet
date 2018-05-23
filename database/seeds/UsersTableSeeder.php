<?php

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
        //For testing Login
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => bcrypt('secret')
        ]);
    }
}
