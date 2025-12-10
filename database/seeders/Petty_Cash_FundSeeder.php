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
                'current_balance' => 500000.00,
                'last_replenished_at' => now(),
                'last_update' => now()
            ],
        ]);
    }
}
