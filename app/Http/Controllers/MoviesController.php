<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Gender;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with(['classification', 'genders'])->get();
        $classifications = Classification::all();
        $genders = Gender::all();
        return view('components.admin.movies', compact('movies', 'classifications', 'genders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'date' => 'required|date',
                'description' => 'required',
                'classification_id' => 'required|exists:classifications,id',
                'genders' => 'required|array',
                'genders.*' => 'exists:genders,id',
            ]);
    
            if ($request->hasFile('image') && $request->hasFile('video')) {
                $title = str_replace(' ', '', $request->title);
                $directory = 'movies/' . $title;
                Storage::makeDirectory($directory);
                $videoPath = $request->file('video')->storeAs($directory, $title . '.mp4');
                $imagePath = $request->file('image')->storeAs($directory, $title . '.' . $request->file('image')->getClientOriginalExtension());
    
                if ($validatedData && $videoPath && $imagePath) {
                    $movie = Movie::create([
                        'title' => $request['title'],
                        'year' => $request['date'],
                        'description' => $request['description'],
                        'classification_id' => $request['classification_id'],
                        'image_url' => $imagePath,
                        'vide_url' => $videoPath
                    ]);
    
                    if ($request->has('genders')) {
                        $movie->genders()->attach($request['genders']);
                    }
    
                    return redirect()->route('movies.index');
                }
            }
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage() . ' on line ' . $th->getLine();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required',
                'updateTittle' => 'required|max:100',
                'updateYear' => 'required|date',
                'updateDescription' => 'required',
                'updateClassification' => 'required|exists:classifications,id',
                'gendersUpdate' => 'required|array',
                'gendersUpdate.*' => 'exists:genders,id',
            ]);
    
            if ($request['videoUpdate'] != null || $request['imageUpdate'] != null) {
                $title = str_replace(' ', '', $request->updateTittle);
                $directory = 'movies/' . $title;
                Storage::makeDirectory($directory);
                
                $videoPath = null;
                if($request['videoUpdate'] != null){
                    $videoPath = $request->file('videoUpdate')->storeAs($directory, $title . '.mp4');
                }

                $imagePath = null;
                if ( $request['imageUpdate'] != null){
                    $imagePath = $request->file('imageUpdate')->storeAs($directory, $title . '.' . $request->file('imageUpdate')->getClientOriginalExtension());
                }
    
                if ($validatedData) {
                    $movie = Movie::find($request['id']);
                    if($movie){
                        $movie->update([
                            'title' => $request['updateTittle'],
                            'year' => $request['updateYear'],
                            'description' => $request['updateDescription'],
                            'classification_id' => $request['updateClassification'],
                        ]);

                        if($imagePath){
                            $movie->update([
                                'image_url' => $imagePath
                            ]);
                        }

                        if($videoPath){
                            $movie->update([
                                'vide_url' => $videoPath
                            ]);
                        }
        
                        if ($request->has('gendersUpdate')) {
                            $movie->genders()->sync($request['gendersUpdate']);
                        }
        
                        return redirect()->route('movies.index');
                    }

                    echo "no validated";
                }

                echo "no video path or image path";
            }

            var_dump($request['imageUpdate']);
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage() . ' on line ' . $th->getLine();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'idDelete' => 'required',
        ]);

        if($validatedData){
            $movie = Movie::find($request['idDelete']);
            if($movie){
                Movie::destroy($request['idDelete']);
                return redirect()->route('movies.index');
            }
        }
    }
}
