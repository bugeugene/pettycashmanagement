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
                'name' => 'Eugene Christian Cas',
                'username' => 'Yuujin',
                'password' => Hash::make('yuujincas0'),
                'email' => 'yuujin.cas@gmail.com',
                'role' => 'Admin'
            ],
            [
                'name' => 'Kathleen Sasaluya',
                'username' => 'Kathleen',
                'password' => Hash::make('kathleensa0'),
                'email' => 'kathleen.sasaluya@gmail.com',
                'role' => 'Admin'
            ],
            [
                'name' => 'Cedrick John Tuscano',
                'username' => 'Cedrick',
                'password' => Hash::make('cjtusacano1'),
                'email' => 'cedricj.tuscano@gmail.com',
                'role' => 'Admin'
            ],
            [
                'name' => 'Kennrich Leigh Betchayda',
                'username' => 'Leigh',
                'password' => Hash::make('kenleyda2'),
                'email' => 'leighrich@gmail.com',
                'role' => 'Finance'
            ],
            [
                'name' => 'Nathaniel Fabricante',
                'username' => 'Natiboy',
                'password' => Hash::make('natnatboy3'),
                'email' => 'nathfab@gmail.com',
                'role' => 'Finance'
            ],
            [
                'name' => 'Earl Dwayne Nacion',
                'username' => 'Earl',
                'password' => Hash::make('earlnacion4'),
                'email' => 'earldwayne@gmail.com',
                'role' => 'Finance'
            ],
            [
                'name' => 'Eric Ocayo',
                'username' => 'Erick',
                'password' => Hash::make('erectyo5'),
                'email' => 'ericocayo@gmail.com',
                'role' => 'Requester'
            ],
            [
                'name' => 'Eric John Villagomez',
                'username' => 'Ejiee',
                'password' => Hash::make('anojiee6'),
                'email' => 'ejieh@gmail.com',
                'role' => 'Requester'
            ],
            [
                'name' => 'Jherome Bernales',
                'username' => 'Jherome',
                'password' => Hash::make('jhernales7'),
                'email' => 'jheromeber@gmail.com',
                'role' => 'Requester'
            ],
            [
                'name' => 'John Doe',
                'username' => 'John',
                'password' => Hash::make('johndoe8'),
                'email' => 'johndoe@gmail.com',
                'role' => 'Finance'
            ],
        ]);
    }
}
