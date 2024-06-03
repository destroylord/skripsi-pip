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
        Subcriteria::insert([
            [
                'parent_id' => 1, 
                'name' => 'Rp.0 - Rp. 500.000', 
                'value' => 5
            ],
            [
                'parent_id' => 1, 
                'name' => 'Rp. 1.000.000', 
                'value' => 4
            ],
            [
                'parent_id' => 1, 
                'name' => 'Rp. 2.000.000', 
                'value' => 3
            ],
            [
                'parent_id' => 1, 
                'name' => 'Rp. 3.000.000', 
                'value' => 2
            ],
            [
                'parent_id' => 1, 
                'name' => '> Rp. 4.000.000', 
                'value' => 1
            ],
            [
                'parent_id' => 2, 
                'name' => '0- 1km', 
                'value' => 1
            ],
            [
                'parent_id' => 2, 
                'name' => '2km', 
                'value' => 2
            ],
            [
                'parent_id' => 2, 
                'name' => '3km', 
                'value' => 3
            ],
            [
                'parent_id' => 2, 
                'name' => '4km', 
                'value' => 4
            ],
            [
                'parent_id' => 2, 
                'name' => '>5km', 
                'value' => 5
            ],
            [
                'parent_id' => 3, 
                'name' => 'Tidak Bekerja', 
                'value' => 6
            ],
            [
                'parent_id' => 3, 
                'name' => 'Petani', 
                'value' => 5
            ],
            [
                'parent_id' => 3, 
                'name' => 'Buruh Haria Lepas', 
                'value' => 4
            ],
            [
                'parent_id' => 3, 
                'name' => 'Sopir', 
                'value' => 3
            ],
            [
                'parent_id' => 3, 
                'name' => 'Wiraswasta', 
                'value' => 2
            ],
            [
                'parent_id' => 3, 
                'name' => 'TNI/Polri/ASN', 
                'value' => 1
            ],
        ]);
    }
}
