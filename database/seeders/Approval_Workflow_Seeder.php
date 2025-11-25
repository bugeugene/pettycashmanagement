<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class Approval_Workflow_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('approval_workflows')->insert([
            [
                'entry_id' => 1,
                'approver_id' => 2,
                'status' => 'PENDING', 
                'remarks' => 'Waiting for approval',
                'created_at' => now()
            ],
            [
                'entry_id' => 2, 'approver_id' => 5,
                'status' => 'APPROVED',
                'remarks' => 'Approved successfully',
                'created_at' => now()
            ],
            [
                'entry_id' => 3, 'approver_id' => 2,
                'status' => 'REJECTED',
                'remarks' => 'Receipts incomplete',
                'created_at' => now()
            ],
            [
                'entry_id' => 4,
                'approver_id' => 5,
                'status' => 'PENDING', 
                'remarks' => 'Reviewing request',
                'created_at' => now()
            ],
            [
                'entry_id' => 5,
                'approver_id' => 5,
                'status' => 'APPROVED',
                'remarks' => 'Confirmed',
                'created_at' => now()
            ],
            [
                'entry_id' => 6,
                'approver_id' => 2,
                'status' => 'PENDING', 
                'remarks' => 'Checking budget',
                'created_at' => now()
            ],
            [
                'entry_id' => 7,
                'approver_id' => 3,
                'status' => 'APPROVED',
                'remarks' => 'All good',
                'created_at' => now()
            ],
            [
                'entry_id' => 8,
                'approver_id' => 6,
                'status' => 'APPROVED',
                'remarks' => 'Released',
                'created_at' => now()
            ],
            [
                'entry_id' => 9,
                'approver_id' => 3,
                'status' => 'APPROVED',
                'remarks' => 'Accepted',
                'created_at' => now()
            ],
            [
                'entry_id' => 10,
                'approver_id' => 5,
                'status' => 'PENDING', 
                'remarks' => 'Awaiting signature',
                'created_at' => now()
            ],
        ]);
    }
}
