<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SubCriteria::insert([
            ['parent_id' => 1, 'name' => 'Rp. 0-Rp. 500.000', 'value' => 5],
            ['parent_id' => 1, 'name' => 'Rp. 500.001-Rp. 1.000.000', 'value' => 4],
            ['parent_id' => 1, 'name' => 'Rp. 1.000.001-Rp. 2.000.000', 'value' => 3],
            ['parent_id' => 1, 'name' => 'Rp. 2.000.001-Rp. 5.000.000', 'value' => 2],
            ['parent_id' => 1, 'name' => '> Rp. 5.000.000', 'value' => 1],
            ['parent_id' => 2, 'name' => '0-1 km', 'value' => 1],
            ['parent_id' => 2, 'name' => '1-5 km', 'value' => 2],
            ['parent_id' => 2, 'name' => '5-10 km', 'value' => 3],
            ['parent_id' => 2, 'name' => '> 10 km', 'value' => 4],
            ['parent_id' => 3, 'name' => 'Tidak Bekerja', 'value' => 9],
            ['parent_id' => 3, 'name' => 'Pelajar/Mahasiswa', 'value' => 9],
            ['parent_id' => 3, 'name' => 'PNS', 'value' => 7],
            ['parent_id' => 3, 'name' => 'Wiraswasta', 'value' => 6],
            ['parent_id' => 3, 'name' => 'Pegawai Swasta', 'value' => 5],
            ['parent_id' => 3, 'name' => 'Petani', 'value' => 4],
            ['parent_id' => 3, 'name' => 'Buruh', 'value' => 3],
            ['parent_id' => 3, 'name' => 'Pensiunan', 'value' => 2],
            ['parent_id' => 3, 'name' => 'Lainnya', 'value' => 1],
        ]);
    }
}
