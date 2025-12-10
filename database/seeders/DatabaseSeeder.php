<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this -> call([
            Petty_Cash_FundSeeder::class,
            Petty_Cash_CategoriesSeeder::class,
            // UsersSeeder::class,
            // Petty_Cash_EntriesSeeder::class,
            // Approval_Workflow_Seeder::class,
            // Audit_LogSeeder::class,
        ]);
    }
}
