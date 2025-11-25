<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Petty_Cash_EntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petty_cash_entries')->insert([
            [
                'requester_id' => 1,
                'category_id' => 1,
                'amount' => 1200,
                'purpose' => 'Printer ink and paper',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 1,
                'status' => 'Pending'
            ],
            [
                'requester_id' => 2,
                'category_id' => 2,
                'amount' => 4500,
                'purpose' =>
                'Client travel',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 2,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 3,
                'category_id' => 3,
                'amount' => 800,
                'purpose' => 'Meeting snacks',
                'date' => now(),
                'entry_type' => 'Replenishment',
                'created_by' => 3,
                'status' => 'Pending'
            ],
            [
                'requester_id' => 4,
                'category_id' => 4,
                'amount' => 6000,
                'purpose' => 'Aircon repair',
                'date' => now(),
                'entry_type' => 'Adjustment',
                'created_by' => 4,
                'status' => 'Rejected'
            ],
            [
                'requester_id' => 5,
                'category_id' => 5,
                'amount' => 2000,
                'purpose' => 'Internet bill',
                'date' => now(),
                'entry_type' => 'Replenishment',
                'created_by' => 5,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 6,
                'category_id' => 6,
                'amount' => 1500,
                'purpose' => 'Fuel for delivery',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 6,
                'status' => 'Pending'
            ],
            [
                'requester_id' => 7,
                'category_id' => 7,
                'amount' => 250,
                'purpose' => 'Parking fee',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 7,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 8,
                'category_id' => 8,
                'amount' => 550,
                'purpose' => 'Document shipping',
                'date' => now(),
                'entry_type' => 'Replenishment',
                'created_by' => 8,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 9,
                'category_id' => 9,
                'amount' => 380,
                'purpose' => 'Cleaning supplies',
                'date' => now(),
                'entry_type' => 'Adjustment',
                'created_by' => 9,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 10,
                'category_id' => 10,
                'amount' => 470,
                'purpose' => 'Printing expenses',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 10,
                'status' => 'Pending'
            ],
        ]);
    }
}
