<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\Viewer;

Route::get('/', [dashboard::class, 'index']) -> name('dashboard');

Route::get('/viewer/{id}', [Viewer::class, 'index'])-> name('viewer');

/*admin routes*/
Route::get('/admin', function(){
    return view('components/admin.dashboar');
});

/*clients routes*/
Route::get('/admin/users',[UserController::class, 'index'])->name('client.index');
Route::post('/admin/users',[UserController::class, 'store'])->name('client.store');
Route::put('/admin/users',[UserController::class, 'update'])->name('client.update');
Route::delete('/admin/users',[UserController::class, 'destroy'])->name('client.destroy');

// movies routes
Route::get('/admin/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::post('/admin/movies', [MoviesController::class, 'store'])->name('movies.store');
Route::put('/admin/movies', [MoviesController::class, 'update'])->name('movies.update');
Route::delete('/admin/movies', [MoviesController::class, 'destroy'])->name('movies.destroy');

/*gender and classification routes*/
Route::get('/admin/gender-classification', [GenderController::class, 'index'])->name('gender.index');

Route::post('/admin/gender-classification-gender', [GenderController::class, 'store'])->name('gender.store');
Route::put('/admin/gender-classification-gender', [GenderController::class, 'update'])->name('gender.update');
Route::delete('/admin/gender-classification-gender', [GenderController::class, 'destroy'])->name('gender.destroy');

Route::post('/admin/gender-classification-classification', [ClassificationController::class, 'store'])->name('classification.store');
Route::put('/admin/gender-classification-classification', [ClassificationController::class, 'update'])->name('classification.update');
Route::delete('/admin/gender-classification-classification', [ClassificationController::class, 'destroy'])->name('classification.destroy');

/*membsership and benefits routes*/
Route::get('/admin/memberships', [BenefitController::class, 'index'])->name('membership.index');

Route::post('/admin/memberships-benefit', [BenefitController::class, 'store'])->name('benefit.store');
Route::put('/admin/memberships-benefit', [BenefitController::class, 'update'])->name('benefit.update');
Route::delete('/admin/memberships-benefit', [BenefitController::class, 'destroy'])->name('benefit.destroy');

Route::post('/admin/memberships-membership', [MembershipController::class, 'store'])->name('membership.store');
Route::put('/admin/memberships-membership', [MembershipController::class, 'update'])->name('membership.update');
Route::delete('/admin/memberships-membership', [MembershipController::class, 'destroy'])->name('membership.destroy');