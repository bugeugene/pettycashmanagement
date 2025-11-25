<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Blake Johnson',
                'username' => 'blake',
                'password' => Hash::make('123456'),
                'email' => 'blake.johnson@gmail.com',
                'role' => 'Admin'
            ],
            [
                'name' => 'Ben Cruz',
                'username' => 'ben',
                'password' => Hash::make('123456'),
                'email' => 'ben@example.com',
                'role' => 'Finance'
            ],
            [
                'name' => 'Carla Reyes',
                'username' => 'carla',
                'password' => Hash::make('123456'),
                'email' => 'carla@example.com',
                'role' => 'Admin'
            ],
            [
                'name' => 'Dino Flores',
                'username' => 'dino',
                'password' => Hash::make('123456'),
                'email' => 'dino@example.com',
                'role' => 'Requester'
            ],
            [
                'name' => 'Ella Lim',
                'username' => 'ella',
                'password' => Hash::make('123456'),
                'email' => 'ella@example.com',
                'role' => 'Finance'
            ],
            [
                'name' => 'Frank Diaz',
                'username' => 'frank',
                'password' => Hash::make('123456'),
                'email' => 'frank@example.com',
                'role' => 'Requester'
            ],
            [
                'name' => 'Grace Santos',
                'username' => 'grace',
                'password' => Hash::make('123456'),
                'email' => 'grace@example.com',
                'role' => 'Finance'
            ],
            [
                'name' => 'Henry Park',
                'username' => 'henry',
                'password' => Hash::make('123456'),
                'email' => 'henry@example.com',
                'role' => 'Admin'
            ],
            [
                'name' => 'Ivy Tan',
                'username' => 'ivy',
                'password' => Hash::make('123456'),
                'email' => 'ivy@example.com',
                'role' => 'Requester'
            ],
            [
                'name' => 'Jack Torres',
                'username' => 'jack',
                'password' => Hash::make('123456'),
                'email' => 'jack@example.com',
                'role' => 'Finance'
            ],
        ]);
    }
}
