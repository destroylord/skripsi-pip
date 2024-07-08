<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\CriteriaComponent;
use App\Livewire\MainComponent;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Kriteria
// Volt::route('parameter', 'pages.parameter.app')->name('parameter.index');

Route::get('/parameter', MainComponent::class)->name('parameter.index');
// Alternatives
Volt::route('calculation-saw', 'pages.calculation.alternatives')->name('alternatives.index');

// Normalisasi
Volt::route('normalization', 'pages.calculation.normalization')->name('normalization.index');

// Rangking
Volt::route('rangking', 'pages.calculation.rangking-layout')->name('rangking.index');

// Result
Volt::route('result', 'pages.calculation.result')->name('result.index');

// Period
Volt::route('periode', 'pages.period.index')->name('period.index');
