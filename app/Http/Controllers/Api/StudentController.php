<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function getStudent(DataTables $datatables) {

        $query = Student::select('full_name', 'gender', 'birth_place', 'birth_date', 'religion', 'kindergarten');

        return $datatables->eloquent($query)
            ->make(true);
    }
}
