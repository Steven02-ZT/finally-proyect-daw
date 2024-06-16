<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ClassificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/viewer/{id}', function ($id) {
    return view('components.viewer',['id' => $id]);
});

/*admin routes*/
Route::get('/admin', function(){
    return view('components/admin.dashboar');
});

Route::get('/admin/users', function(){
    return view('components/admin.users');
});

// movies routes
Route::get('/admin/movies', function(){
    return view('components/admin.movies');
});

Route::post('/admin/movies', [MoviesController::class, 'store'])->name('movies.store');

/*gender and classification route*/
Route::get('/admin/gender-classification', [GenderController::class, 'index'])->name('gender.index');

Route::post('/admin/gender-classification-gender', [GenderController::class, 'store'])->name('gender.store');
Route::put('/admin/gender-classification-gender', [GenderController::class, 'update'])->name('gender.update');
Route::delete('/admin/gender-classification-gender', [GenderController::class, 'destroy'])->name('gender.destroy');

Route::post('/admin/gender-classification-classification', [ClassificationController::class, 'store'])->name('classification.store');
Route::put('/admin/gender-classification-classification', [ClassificationController::class, 'update'])->name('classification.update');
Route::delete('/admin/gender-classification-classification', [ClassificationController::class, 'destroy'])->name('classification.destroy');

Route::get('/admin/memberships', function(){
    return view('components/admin.memberships');
});