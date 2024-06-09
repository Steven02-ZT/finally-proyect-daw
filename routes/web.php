<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/viewer/{id}', function ($id) {
    return view('components.viewer',['id' => $id]);
});