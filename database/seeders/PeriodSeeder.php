<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($year = 2015; $year <= date('Y'); $year++) {
            \App\Models\Period::create([
                'name' => $year
            ]);
        }
    }
}
