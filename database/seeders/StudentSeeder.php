<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\Student;
use App\Models\Subcriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use Symfony\Component\Yaml\Yaml;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $studentJson = File::get("database/data/students.json");
         $alternativeYaml = __DIR__ . '/../../database/data/alternative.yaml';
         $yaml = new Yaml();

         $students = json_decode($studentJson);
         $alternatives = $yaml->parseFile($alternativeYaml);

        //  $studentJson = File::get("database/data/students.json");
        //  $alternativeJson = File::get("database/data/alternative.json");

        //  $students = json_decode($studentJson);
        //  $alternatives = json_decode($alternativeJson);

            foreach ($students as $student) {
                $student = Student::create([
                    'full_name' => $student->full_name,
                    'gender' => $student->gender,
                    'type' => $student->type,
                    'birth_place' => $student->birth_place,
                    'birth_date' => $student->birth_date,
                    'religion' => $student->religion,
                    'kindergarten' => $student->kindergarten,
                    'home_address' => $student->home_address,
                    'father_name' => $student->father_name,
                    'mother_name' => $student->mother_name,
                ]);

                if (!isset($alternatives[$student->id-1])){
                    
                    $student->delete();
                    break;
                } 

                    
                foreach ($alternatives[$student->id-1] as $alternative) {
                        
                        foreach ($alternative as $key => $value) {
                            
                            Alternative::create([
                                'student_id' => $student->id,
                                'criteria_id' => $key,
                                'value' => $value,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);

                        $subCriteria = Subcriteria::where('parent_id', $key)
                                                 ->where('value', $value)
                                                 ->first();

                        if (!$subCriteria) {
                            
                            dump($key . ' - ' . $value);
                        }

                        $subCriteriaId = $subCriteria ? $subCriteria->id : null;

                        \DB::table('student_criterias')->insert([
                            'student_id' => $student->id,
                            'subcriteria_id' => $subCriteriaId,
                        ]);
                    }
                }
            }

    }
}
