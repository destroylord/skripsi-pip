<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AlternativeController extends Controller
{
    public function index(DataTables $dataTables)
    {
        $query = Alternative::selectRaw('students.full_name, criterias.name as criteria_name, criteria_id, sum(value) as value')
                ->join('students', 'alternatives.student_id', '=', 'students.id')
                ->join('criterias', 'alternatives.criteria_id', '=', 'criterias.id')
                ->groupBy(['student_id', 'criteria_id'])
                ->get()
                ->groupBy('criteria_id')
                ->map(function ($item) {
                    return $item->groupBy('full_name')->map(function ($i) {
                        return $i->first();
                    });
                })
                ->map(function ($i) {
                    return $i->map(function ($d) {
                        return [
                            'full_name' => $d->full_name,
                            'value' => $d->value,
                            'criteria_name' => $d->criteria_name
                        ];
                    })->values()->toArray();
                })
                ->values()
                ->toArray();

            dd($query);
    }
}
