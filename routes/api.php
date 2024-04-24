<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-student', [\App\Http\Controllers\Api\StudentController::class, 'getStudent']);
Route::get('/altenatives', [\App\Http\Controllers\Api\AlternativeController::class, 'index']);