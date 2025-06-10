<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Post

// Route::get('/post', [PostController::class, 'index'])->name('post');
Volt::get('/post', [PostController::class, 'index'])->name('post');