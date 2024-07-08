<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return datatables(Period::query())
                ->addIndexColumn()
                ->addColumn('action', fn ($per) => view('livewire.pages.period.action', compact('per')))
                ->toJson();

    }
}
