<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AlternativeRepository 
{
    public static function store(Student $student)
    {
        $subCriterias = $student->subCriterias;
        
        foreach ($subCriterias as $subCriteria) {

            $data = DB::table('alternatives')->insert([
                'student_id' => $student->id,
                'criteria_id' => $subCriteria->criteria->id,
                'value' => $subCriteria->value,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }

        

        return $data;
    }
}
