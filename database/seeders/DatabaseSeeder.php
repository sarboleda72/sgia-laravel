<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tool;
use App\Models\Loan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        //Tool::factory(5)->create();

        $this->call([
            UserSeeder::class,
            ToolSeeder::class,
            LoanSeeder::class
        ]);
    }
}
