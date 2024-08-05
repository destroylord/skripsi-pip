<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\BlankComponent;
use App\Livewire\CalculationSawComponent;
use App\Livewire\MainComponent;
use App\Livewire\UploadedStudentComponent;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/dashboard', DashboardController::class)->name('dashboard');


Route::get('/parameter', MainComponent::class)->name('parameter.index');

// Alternatives
// Volt::route('calculation-saw', 'pages.calculation.alternatives')->name('alternatives.index');
Route::get('/calculation-saw', CalculationSawComponent::class)->name('calculation-saw.index');

Route::get('/uploaded-students', UploadedStudentComponent::class)->name('uploaded-students.index');


// Blank
Route::get('/blank', BlankComponent::class);
// Normalisasi
Volt::route('normalization', 'pages.calculation.normalization')->name('normalization.index');

// Rangking
Volt::route('rangking', 'pages.calculation.rangking-layout')->name('rangking.index');

// Result
Volt::route('result', 'pages.calculation.result')->name('result.index');

// Period
Volt::route('periode', 'pages.period.index')->name('period.index');
