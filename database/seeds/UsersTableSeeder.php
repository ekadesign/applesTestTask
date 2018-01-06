<?php

use \App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'      => 'admin@noreply.com',
            'password'   => bcrypt('secret'),
            'name' => 'Jonathan',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'remember_token' => '',
        ]);



        DB::table('users')->insert([
            'email'      => 'adrian@noreply.com',
            'password'   => bcrypt('secret'),
            'name' => 'Adrian',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'remember_token' => '',
        ]);



        DB::table('users')->insert([
            'email'      => 'julie@noreply.com',
            'password'   => bcrypt('secret'),
            'name' => 'Julie',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'remember_token' => '',
        ]);


    }
}