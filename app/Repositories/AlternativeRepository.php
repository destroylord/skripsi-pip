<?php

namespace App\Repositories;

use App\Models\Alternative;
use App\Models\Criteria;
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

    public function index()
    {

        $criteria = Criteria::all();
        $student = Student::all();

        $student->map(function ($s) use ($criteria) {
           $s->alternatives = $criteria->map(function ($c) use ($s) {
               return Alternative::where('student_id', $s->id)->where('criteria_id', $c->id)->get();
           });
           return $s;
        });

        return (object) ['criterias' => $criteria, 'students' => $student];
    }
}
