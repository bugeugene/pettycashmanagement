<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class Audit_LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('audit_logs')->insert([
            [
                'user_id' => 1,
                'entry_id' => 1,
                'action_type' => 'LOGIN',
                'details' => 'User logged in',
                'time_stamp' => now()
            ],
            [
                'user_id' => 2,
                'entry_id' => 2,
                'action_type' => 'UPDATE',
                'details' => 'Updated profile',
                'time_stamp' => now()
            ],
            [
                'user_id' => 3,
                'entry_id' => 3,
                'action_type' => 'APPROVE',
                'details' => 'Approved entry',
                'time_stamp' => now()
            ],
            [
                'user_id' => 4,
                'entry_id' => 4,
                'action_type' => 'CREATE',
                'details' => 'Created new entry',
                'time_stamp' => now()
            ],
            [
                'user_id' => 5,
                'entry_id' => 5,
                'action_type' => 'APPROVE',
                'details' => 'Approved request',
                'time_stamp' => now()
            ],
            [
                'user_id' => 6,
                'entry_id' => 6,
                'action_type' => 'CREATE',
                'details' => 'Create entry',
                'time_stamp' => now()
            ],
            [
                'user_id' => 7,
                'entry_id' => 7,
                'action_type' => 'REJECT',
                'details' => 'Request rejected',
                'time_stamp' => now()
            ],
            [
                'user_id' => 8,
                'entry_id' => 8,
                'action_type' => 'CREATE',
                'details' => 'Added new users',
                'time_stamp' => now()
            ],
            [
                'user_id' => 9,
                'entry_id' => 9,
                'action_type' => 'LOGIN',
                'details' => 'User logged in',
                'time_stamp' => now()
            ],
            [
                'user_id' => 10,
                'entry_id' => 10,
                'action_type' => 'LOGIN',
                'details' => 'User logged in',
                'time_stamp' => now()
            ],
        ]);
    }
}
