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
                'name' => 'Penghasilan Ayah',
                'score' => 25,
                'weight' => '0.25',
                'type' => 'Cost'
            ],
            [
                'name' => 'Pekerjaan Ayah',
                'score' => 20,
                'weight' => '0.2',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Penghasilan Ibu',
                'score' => 10,
                'weight' => '0.1',
                'type' => 'Cost'
            ],
            [
                'name' => 'Pekerjaan Ibu',
                'score' => 10,
                'weight' => '0.1',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Jarak tempuh',
                'score' => 5,
                'weight' => '0.05',
                'type' => 'Cost'
            ],
            [
                'name' => 'Penerima KPS',
                'score' => 5,
                'weight' => '0.05',
                'type' => 'Benefit'
            ],
            [
                'name' => 'Transportasi',
                'score' => 15,
                'weight' => '0.15',
                'type' => 'Cost'
            ],
            [
                'name' => 'Alasan Layak PIP',
                'score' => 10,
                'weight' => '0.1',
                'type' => 'Benefit'
            ]
        ]);
    }
}
