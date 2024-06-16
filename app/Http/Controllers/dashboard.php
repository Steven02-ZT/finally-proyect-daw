<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {
        $movies = Movie::with(['classification', 'genders'])->get();
        return view('welcome', compact('movies'));
    }
}
