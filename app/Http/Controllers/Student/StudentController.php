<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Alert;
use App\Models\Criteria;
use App\Models\Subcriteria;
use App\Repositories\AlternativeRepository;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function registration()
    {    
        return view('student-registration-form', [
            'mileages' => self::getSubcriteria(2), // jarak tempuh
            'typeWorks' => self::getSubcriteria(3), // tipe pekerjaan
            'incomes' => self::getSubcriteria(1), // pendapatan
            'criterias' => Criteria::pluck('id')->toArray(),
        ]);
    }

    public function store(StudentRequest $request)
    {
       
        $requestData = $request->all();
        $student  = Student::create($requestData);

        foreach ($request->subcriteria_id as $key => $value) {
            DB::table('student_criterias')->insert([
                'student_id' => $student->id,
                'subcriteria_id' => (int) $value
            ]);
        }

        AlternativeRepository::store($student);

        Alert::success('Berhasil!!!', 'Data Telah disimpan ke database')->autoclose(3000);
        return back();
    }

    public static function getSubcriteria($id) {

        return SubCriteria::where('parent_id', $id)->get();
        
    }
}
