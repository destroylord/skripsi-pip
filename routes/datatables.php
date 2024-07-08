<?php

use App\Http\Controllers\Datatables\PeriodController;
use Illuminate\Support\Facades\Route;

Route::get('/period', PeriodController::class)->name('period.index');