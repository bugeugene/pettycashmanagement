<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Petty_Cash_FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petty_cash_funds')->insert([
            [
                'limit' => 5000,
                'last_replenished_at' => '2025-01-02 09:30:00',
                'updated_at' => '2025-01-02 09:30:00'
            ],
            [
                'limit' => 10000,
                'last_replenished_at' => '2025-01-03 14:10:00',
                'updated_at' => '2025-01-03 14:10:00'
            ],
            [
                'limit' => 8000,
                'last_replenished_at' => '2025-01-04 16:45:00',
                'updated_at' => '2025-01-04 16:45:00'
            ],
            [
                'limit' => 12000,
                'last_replenished_at' => '2025-01-05 08:00:00',
                'updated_at' => '2025-01-05 08:00:00'
            ],
            [
                'limit' => 15000,
                'last_replenished_at' => '2025-01-06 11:20:00',
                'updated_at' => '2025-01-06 11:20:00'
            ],
            [
                'limit' => 3000,
                'last_replenished_at' => '2025-01-07 09:00:00', 
                'updated_at' => '2025-01-07 09:00:00'
            ],
            [
                'limit' => 4500,
                'last_replenished_at' => '2025-01-08 10:30:00',
                'updated_at' => '2025-01-08 10:30:00'
            ],
            [
                'limit' => 2500,
                'last_replenished_at' => '2025-01-09 08:50:00',
                'updated_at' => '2025-01-09 08:50:00'
            ],
            [
                'limit' => 9000,
                'last_replenished_at' => '2025-01-10 14:40:00', 
                'updated_at' => '2025-01-10 14:40:00'
            ],
            [
                'limit' => 6000, 
                'last_replenished_at' => '2025-01-11 07:20:00', 
                'updated_at' => '2025-01-11 07:20:00'
            ],
        ]);
    }
}
