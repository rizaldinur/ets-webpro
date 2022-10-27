<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $users = [
            [
                'id'             => 1,
                'name'       => '123',
                'email'           => '123@123.123',
                'password'       => bcrypt('123123123'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'       => 'rizaldi',
                'email'           => 'rizaldi@123.123',
                'password'       => bcrypt('123123123'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'       => 'fuad',
                'email'           => 'fuad@123.123',
                'password'       => bcrypt('123123123'),
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'       => 'arif',
                'email'           => 'arif@123.123',
                'password'       => bcrypt('123123123'),
                'remember_token' => null,
            ],
            
            
        ];

        User::insert($users);


    }
}
