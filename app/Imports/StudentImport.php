<?php

namespace App\Imports;

use App\Models\Alternative;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentImport implements ToCollection, WithHeadingRow, WithHeadings
{

    public Period $period;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
           $data = [
                'full_name' => $row['full_name'] ?? '',
                'nisn' => $row['nisn'] ?? '',
                'gender' => $row['gender'] ?? '',
                'birth_place' => $row['birth_place'] ?? '',
                // 'birth_date' => $row['birth_date'] ?? '',
                'religion' => $row['religion'] ?? '',
                'kindergarten' => $row['kindergarten'] ?? '',
                'kindergarten_address' => $row['kindergarten_address'] ?? '',
                'home_address' => $row['home_address'] ?? '',
                'father_name' => $row['father_name'] ?? '',
                'father_address' => $row['father_address'] ?? '',
                'father_birth_place' => $row['father_birth_place'] ?? '',
                // 'father_birth_date' => $row['father_birth_date'] ?? '',
                'mother_name' => $row['mother_name'] ?? '',
                'mother_address' => $row['mother_address'] ?? '',
                'mother_birth_place' => $row['mother_birth_place'] ?? '',
                // 'mother_birth_date' => $row['mother_birth_date'] ?? '',
                'birth_certificate' => $row['birth_certificate'] ?? '',
                'family_card' => $row['family_card'] ?? '',
                'kindergarten_certificate' => $row['kindergarten_certificate'] ?? '',
                'type' => $row['type'] ?? '',
           ];

           $studetNisn = Student::firstOrCreate(['nisn' => $data['nisn']], $data);
           $af = array_filter($row->toArray(), fn($dt) => str_contains($dt, 'c_') , ARRAY_FILTER_USE_KEY);
           
           $this->period->criterias->map(function ($c) use ($af, $studetNisn) {
               Alternative::updateOrCreate([
                   'student_id' => $studetNisn->id,
                   'criteria_id' => $c->id,
               ], [
                   'value' => $af["c_{$c->id}"]
               ]);
           });

           $this->period->students()
                ->attach([
                'student_id' => $studetNisn->id
           ]);
        }
    }

    /**
     * Auto-generate the header row from the first row of the excel file
     *
     * @return array
     */
    public function headings(): array
    {
       return [
           'full_name', 'nisn', 'gender', 'birth_place', 'birth_date', 'religion',
           'kindergarten', 'kindergarten_address', 'home_address', 'father_name',
           'father_address', 'father_birth_place', 'father_birth_date', 'mother_name',
           'mother_address', 'mother_birth_place', 'mother_birth_date',
           'birth_certificate', 'family_card', 'kindergarten_certificate'
       ];
    }

}