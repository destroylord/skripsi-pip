<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::create([
            ['name' => 'Penghasilan Orang Tua', 'score' => 40, 'weight' => '0.4', 'type' => 'Cost'],
            ['name' => 'Jarak Tempuh', 'score' => 30, 'weight' => '0.3', 'type' => 'Benefit'],
            ['name' => 'Pekerjaan Orang Tua', 'score' => 30, 'weight' => '0.3', 'type' => 'Cost'],
        ]);
    }
}
