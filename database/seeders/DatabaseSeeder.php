<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Period;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PeriodSeeder::class,
            UserSeeder::class,
            CriteriaSeeder::class,
            SubCriteriaSeeder::class,
            // StudentSeeder::class
        ]);
    }
}
