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

        // Inisialisasi default value untuk dokumen
        $requestData['birth_certificate'] = null;
        $requestData['family_card'] = null;
        $requestData['kindergarten_certificate'] = null;

        // Periksa jika terdapat file yang diunggah dan simpan sesuai dengan jenisnya
        if ($request->hasFile('birth_certificate') && $request->hasFile('family_card') && $request->hasFile('kindergarten_certificate')) {
            $requestData['birth_certificate'] = $this->uploadDocument($request, 'birth_certificate');
            $requestData['family_card'] = $this->uploadDocument($request, 'family_card');
            $requestData['kindergarten_certificate'] = $this->uploadDocument($request, 'kindergarten_certificate');
        }
        
        $student = Student::create($requestData);

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

    // Fungsi untuk mengunggah dokumen
    private function uploadDocument($request, $documentName)
    {
        $documentFile = $request->file($documentName);
        $fileName = $documentFile->getClientOriginalName();
        $path = str_replace(' ', '-', "documents/".$request->full_name."/{$documentName}".str_replace(' ', '-', $request->name));

        // Simpan file dengan nama unik
        return $documentFile->storeAs($path, $fileName, 'public');
    }
}
