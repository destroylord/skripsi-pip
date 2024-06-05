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
                'name' => 'Tidak Berpenghasilan', 
                'value' => 6
            ],
            [
                'parent_id' => 1, 
                'name' => '< Rp.500.000', 
                'value' => 5
            ],
            [
                'parent_id' => 1, 
                'name' => '500.000 - 999.999', 
                'value' => 4
            ],
            [
                'parent_id' => 1, 
                'name' => '1.000.000 - 1.999.999', 
                'value' => 3
            ],
            [
                'parent_id' => 1, 
                'name' => '2.000.000 - 4.999.999', 
                'value' => 2
            ],
            [
                'parent_id' => 1, 
                'name' => '> 5000.000', 
                'value' => 1
            ],
            [
                'parent_id' => 2, 
                'name' => '<1km', 
                'value' => 1
            ],
            [
                'parent_id' => 2, 
                'name' => '2km', 
                'value' => 2
            ],
            [
                'parent_id' => 2, 
                'name' => '>2km', 
                'value' => 3
            ],
            
            [
                'parent_id' => 3, 
                'name' => 'Tidak Bekerja', 
                'value' => 5
            ],
            [
                'parent_id' => 3, 
                'name' => 'Petani', 
                'value' => 4
            ],
            [
                'parent_id' => 3, 
                'name' => 'Buruh', 
                'value' => 3
            ],
            [
                'parent_id' => 3, 
                'name' => 'Wiraswasta', 
                'value' => 2
            ],
            [
                'parent_id' => 3, 
                'name' => 'Karyawan Swasta', 
                'value' => 1
            ],
            [
                'parent_id' => 3, 
                'name' => 'PNS/TNI/Polri', 
                'value' => 0
            ],
            [
                'parent_id' => 4,
                'name' => "Ya",
                'value' => 4 
            ],
            [
                'parent_id' => 4,
                'name' => "Tidak",
                'value' => 1
            ],
            [
                'parent_id' => 5,
                'name' => "Jalan Kaki",
                'value' => 1 
            ],
            [
                'parent_id' => 5,
                'name' => "Sepeda pancat",
                'value' => 2
            ],
            [
                'parent_id' => 5,
                'name' => "Becak",
                'value' => 3
            ],
            [
                'parent_id' => 5,
                'name' => "Sepeda Motor",
                'value' => 4
            ],
            [
                'parent_id' => 6,
                'name' => "1",
                'value' => 7 
            ],
            [
                'parent_id' => 6,
                'name' => "2",
                'value' => 6
            ],
            [
                'parent_id' => 6,
                'name' => "3",
                'value' => 5
            ],
            [
                'parent_id' => 6,
                'name' => "4",
                'value' => 4
            ],
            [
                'parent_id' => 6,
                'name' => "5",
                'value' => 3
            ],
            [
                'parent_id' => 6,
                'name' => "6",
                'value' => 2
            ],
            [
                'parent_id' => 6,
                'name' => "7",
                'value' => 1
            ],
        ];
    }
}
