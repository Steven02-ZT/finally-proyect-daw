<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/movies', function(){
    return view('components/admin.movies');
});

Route::get('/admin/gender-classification', function(){
    return view('components/admin.category_gender');
});

Route::get('/admin/memberships', function(){
    return view('components/admin.memberships');
});