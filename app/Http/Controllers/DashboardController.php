<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use App\Repositories\RangkingRepository;
use App\Models\Student;

class DashboardController extends Controller
{

    public $students;

    /**
     * Handle the incoming request.
     */
    public function __invoke(
        RangkingRepository $rangkingRepository, 
        NormalizationRepository $normalizationRepository, 
        AlternativeRepository $AlternativeRepository)
    {
        $alternatives = $AlternativeRepository->index();
        $normalized = $normalizationRepository->getCalculation($alternatives);
        $ranked = $rangkingRepository->getCalculation($normalized);

        $recomended = $rangkingRepository->getRangked($ranked->students)
            ->sortBy('full_name')
            ->where('type', 'tampil')
            ->take(39)->filter(fn($student) => $student->ranking <= 39)->count();

        $accuration = $recomended / 39 * 100;

        $data = [
            [
                'name' => 'Jumlah seluruh siswa',
                'title' => Student::count()
            ],
            [
                'name' => 'Siswa yang direkomendasikan sekolah',
                'title' => Student::where('type', 'tampil')->count()
            ],
            [
                'name' => 'Siswa yang direkomendasikan aplikasi',
                'title' => $recomended
            ],
            [
                'name' => 'Akurasi',
                'title' => number_format($accuration, 2). '%'
            ]
            ];
        return view('admin.dashboard', compact('data'));
    }
}
