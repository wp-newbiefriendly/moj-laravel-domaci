<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ocene = \App\Models\Ocene::all();
    return view('welcome', compact('ocene'));
});

Route::view('/dodaj-ocenu', 'addGrade');
Route::post("/add-user-grade", [\App\Http\Controllers\OceneController::class, 'addGrade']);
