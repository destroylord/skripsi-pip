<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Kriteria
Volt::route('criteria', 'pages.criteria.criteria')->name('criteria.index');
Volt::route('sub-create', 'pages.criteria.sub-criteria')->name('sub-criteria');

// Alternatives
Volt::route('alternatives', 'pages.calculation.alternatives')->name('alternatives.index');

// Normalisasi
Volt::route('normalization', 'pages.calculation.normalization')->name('normalization.index');

// Rangking
Volt::route('rangking', 'pages.calculation.rangking-layout')->name('rangking.index');

// Result
Volt::route('result', 'pages.calculation.result')->name('result.index');