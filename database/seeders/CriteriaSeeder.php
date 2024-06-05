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
        Criteria::insert([
            [
                'name' => 'Penghasilan Orang Tua',
                'score' => 25,
                'weight' => '0.25',
                'type' => 'Cost'
            ],
            [
                'name' => 'Jarak Tempuh',
                'score' => 10,
                'weight' => '0.1',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Pekerjaan Orang Tua',
                'score' => 10,
                'weight' => '0.1',
                'type' => 'Cost'
            ],
            [
                'name' => 'Penerima KPS',
                'score' => 30,
                'weight' => '0.3',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Transportasi',
                'score' => 10,
                'weight' => '0.1',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Anak ke -',
                'score' => 15,
                'weight' => '0.15',
                'type' => 'Cost'
            ],
        ]);
    }
}
