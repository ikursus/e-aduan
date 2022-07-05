<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Query builder
        DB::table('users')->insert([
            'name' => 'Ali',
            'email' => 'ali@test.com',
            'password' => Hash::make('Pass123'),
            'phone' => '0123456789',
            'status' => 'ACTIVE',
            'role' => 'ADMIN'
        ]);

        DB::table('users')->insert([
            'name' => 'Abu',
            'email' => 'abu@test.com',
            'password' => bcrypt('Pass123'),
            'phone' => '0123456789',
            'status' => 'ACTIVE',
            'role' => 'USER'
        ]);

        DB::table('users')->insert([
            'name' => 'Siti',
            'email' => 'siti@test.com',
            'password' => bcrypt('Pass123'),
            'phone' => '0123456789',
            'status' => 'ACTIVE',
            'role' => 'USER'
        ]);
    }
}
