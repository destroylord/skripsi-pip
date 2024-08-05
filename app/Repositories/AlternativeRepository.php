<?php

namespace App\Repositories;
;
use App\Models\Period;
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

    public function index(?Period $period)
    {

        if (!$period) {
            return (object) ['criterias' => collect([]), 'students' => collect([])];
        }
        
        $period->students->map(function ($s) use ($period) {
           $s->alternatives = $period->criterias->map(function ($c) use ($s) {
               return $c->alternatives()->where('student_id', $s->id)->get();
           });
           return $s;
        });

        return (object) ['criterias' => $period->criterias, 'students' => $period->students];
    }
}
