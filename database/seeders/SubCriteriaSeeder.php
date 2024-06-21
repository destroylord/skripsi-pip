<?php

namespace Database\Seeders;

use App\Models\Subcriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCriteria = $this->getSubCriteriaData();
        foreach ($subCriteria as $data) {
            Subcriteria::create($data);
        }
    }

    private function getSubCriteriaData(): array
    {
        return [
            [
                'parent_id' => 1, 
                'name' => '0 - 499.999', 
                'value' => 2
            ],
            [
                'parent_id' => 1, 
                'name' => '500.000 - 999.999', 
                'value' => 3
            ],
            [
                'parent_id' => 1, 
                'name' => '1.000.000 - 1.999.999', 
                'value' => 4
            ],
            [
                'parent_id' => 1, 
                'name' => '> 2.000.000', 
                'value' => 5
            ],
            [
                'parent_id' => 2,
                'name' => 'Tidak Bekerja / Petani / Buruh',
                'value' => 5
            ],
            [
                'parent_id' => 2,
                'name' => 'Wiraswasta',
                'value' => 4
            ],
            [
                'parent_id' => 2,
                'name' => 'Karyawan Swasta',
                'value' => 3
            ],
            [
                'parent_id' => 2,
                'name' => 'PNS/TNI/Polri',
                'value' => 2
            ],
            [
                'parent_id' => 3, 
                'name' => '0 - 499.999', 
                'value' => 2
            ],
            [
                'parent_id' => 3, 
                'name' => '500.000 - 999.999', 
                'value' => 3
            ],
            [
                'parent_id' => 3, 
                'name' => '1.000.000 - 1.999.999', 
                'value' => 4
            ],
            [
                'parent_id' => 3, 
                'name' => '> 2.000.000', 
                'value' => 5
            ],
            [
                'parent_id' => 4,
                'name' => 'Tidak Bekerja / Petani / Buruh',
                'value' => 5
            ],
            [
                'parent_id' => 4,
                'name' => 'Wiraswasta',
                'value' => 4
            ],
            [
                'parent_id' => 4,
                'name' => 'Karyawan Swasta',
                'value' => 3
            ],
            [
                'parent_id' => 4,
                'name' => 'PNS/TNI/Polri',
                'value' => 2
            ],
            [
                'parent_id' => 5,
                'name' => '< 1 km',
                'value' => 3
            ],
            [
                'parent_id' => 5,
                'name' => '2 km',
                'value' => 4
            ],
            [
                'parent_id' => 5,
                'name' => '> 2 km',
                'value' => 5
            ],
            [
                'parent_id' => 6,
                'name' => 'Ya',
                'value' => 1
            ],
            [
                'parent_id' => 6,
                'name' => 'Tidak',
                'value' => 5
            ],
            [
                'parent_id' => 7,
                'name' => 'Jalan Kaki',
                'value' => 5
            ],
            [
                'parent_id' => 7,
                'name' => 'Becak',
                'value' => 4
            ],
            [
                'parent_id' => 7,
                'name' => 'Sepeda pancal',
                'value' => 3
            ],
            [
                'parent_id' => 7,
                'name' => 'Sepeda Motor',
                'value' => 2
            ],
            [
                'parent_id' => 8,
                'name' => 'Siswa Miskin/Rentan Miskin',
                'value' => 5
            ],
            [
                'parent_id' => 8,
                'name' => 'Yatim Piatu/Panti Asuhan/Panti Sosial',
                'value' => 4
            ],
            [
                'parent_id' => 8,
                'name' => 'Pemegang PKH/KPS/KKS',
                'value' => 3
            ],
            [
                'parent_id' => 8,
                'name' => 'Sudah Mampu',
                'value' => 2
            ],
            
        ];
    }
}
