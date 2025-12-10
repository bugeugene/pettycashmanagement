<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Petty_Cash_CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('petty_cash_categories')->insert([
            [
                'name' => 'Office Supplies',
                'description' => 'Purchases related to office materials'
            ],
            [
                'name' => 'Travel',
                'description' => 'Expenses for transportation and lodging'
            ],
            [
                'name' => 'Meals',
                'description' => 'Food and refreshments during meetings'
            ],
            [
                'name' => 'Repairs',
                'description' => 'Equipment or facility maintenance'
            ],
            [
                'name' => 'Utilities',
                'description' => 'Electricity, water, and internet bills'
            ],
            [
                'name' => 'Fuel',
                'description' => 'Gasoline or diesel expenses for company vehicles'
            ],
            [
                'name' => 'Parking Fees',
                'description' => 'Parking payments for company errands'
            ],
            [
                'name' => 'Delivery Fees',
                'description' => 'Courier and shipping expenses'
            ],
            [
                'name' => 'Cleaning Supplies',
                'description' => 'Janitorial and sanitation materials'
            ],
            [
                'name' => 'Printing',
                'description' => 'Photocopying, printing, and document production costs'
            ],
            [
                'name' => 'Postage',
                'description' => 'Mailing and postal service expenses'
            ],
            [
                'name' => 'Employee Allowance',
                'description' => 'Small allowances provided to staff'
            ],
            [
                'name' => 'Snacks',
                'description' => 'Light snacks for employees or visitors'
            ],
            [
                'name' => 'Workshop Materials',
                'description' => 'Items used for seminars, workshops, or training'
            ],
            [
                'name' => 'Software Subscriptions',
                'description' => 'Small monthly digital tool or app payments'
            ],
            [
                'name' => 'Marketing Materials',
                'description' => 'Flyers, brochures, or promotional items'
            ],
            [
                'name' => 'Miscellaneous',
                'description' => 'Uncategorized but valid small expenses'
            ],
            [
                'name' => 'Bank Charges',
                'description' => 'Small transaction fees and service charges'
            ],
            [
                'name' => 'Emergency Purchases',
                'description' => 'Urgent needs required for operations'
            ],
            [
                'name' => 'Equipment Rentals',
                'description' => 'Short-term rentals of tools or devices'
            ],
        ]);
    }
}
