<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($year = 2020; $year <= date('Y')-1; $year++) {
            Period::create([
                'name' => "$year/".($year + 1),
            ]);
        }
        
    }
}
