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
                'requester_id' => 4,
                'category_id' => 1,
                'amount' => 1200,
                'purpose' => 'Purchase of printer ink cartridges and multipurpose paper for office use',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 4,
                'status' => 'Pending'
            ],
            [
                'requester_id' => 4,
                'category_id' => 2,
                'amount' => 4500,
                'purpose' => 'Travel expenses for client visit and related business meetings',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 4,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 6,
                'category_id' => 3,
                'amount' => 800,
                'purpose' => 'Procurement of snacks and refreshments for scheduled team meeting',
                'date' => now(),
                'entry_type' => 'Replenishment',
                'created_by' => 6,
                'status' => 'Pending'
            ],
            [
                'requester_id' => 6,
                'category_id' => 4,
                'amount' => 6000,
                'purpose' => 'Repair and maintenance service for office air-conditioning unit',
                'date' => now(),
                'entry_type' => 'Adjustment',
                'created_by' => 6,
                'status' => 'Rejected'
            ],
            [
                'requester_id' => 9,
                'category_id' => 5,
                'amount' => 2000,
                'purpose' => 'Monthly internet service payment for office operations',
                'date' => now(),
                'entry_type' => 'Replenishment',
                'created_by' => 9,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 4,
                'category_id' => 6,
                'amount' => 1500,
                'purpose' => 'Fuel expenses for delivery vehicle used for company logistics',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 4,
                'status' => 'Pending'
            ],
            [
                'requester_id' => 6,
                'category_id' => 7,
                'amount' => 250,
                'purpose' => 'Parking fee for official business errand',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 6,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 9,
                'category_id' => 8,
                'amount' => 550,
                'purpose' => 'Courier and shipping costs for sending official documents',
                'date' => now(),
                'entry_type' => 'Replenishment',
                'created_by' => 9,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 6,
                'category_id' => 9,
                'amount' => 380,
                'purpose' => 'Purchase of cleaning materials for office maintenance',
                'date' => now(),
                'entry_type' => 'Adjustment',
                'created_by' => 6,
                'status' => 'Approved'
            ],
            [
                'requester_id' => 9,
                'category_id' => 10,
                'amount' => 470,
                'purpose' => 'Expenses for document printing and photocopying needs',
                'date' => now(),
                'entry_type' => 'Request',
                'created_by' => 9,
                'status' => 'Pending'
            ],
        ]);
    }
}
