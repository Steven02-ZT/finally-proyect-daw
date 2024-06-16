<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'classification' => 'required|max:100',
            'ClassificationDescription' => 'required',
        ]);

        if ($validatedData) {
            $classification = Classification::create([
                'name' => $request['classification'],
                'description' => $request['ClassificationDescription']
            ]);

            if ($classification != null) {
                return redirect()->route('gender.index');
            }
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
        $validatedData = $request->validate([
            'idClassification' => 'required',
            'updateclassification' => 'required|max:30',
            'updateClassificationDescription' => 'required',
        ]);

        if ($validatedData) {
            $gender = Classification::find($request['idClassification']);

            if ($gender) {
                $gender->update([
                    'name' => $request['updateclassification'],
                    'description' => $request['updateClassificationDescription']
                ]);

                return redirect()->route('gender.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'idClassificationDelete' => 'required',
        ]);

        if($validatedData){
            $gender = Classification::find($request['idClassificationDelete']);
            if($gender){
                Classification::destroy($request['idClassificationDelete']);
                return redirect()->route('gender.index');
            }
        }
    }
}
