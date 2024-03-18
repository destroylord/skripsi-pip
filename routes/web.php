<?php

use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('welcome');

Route::get('ppdb', [StudentController::class, 'registration'])->name('registration.student');
Route::post('form-pendaftaran-siswa-store', [StudentController::class, 'store'])->name('registration.student.store');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';