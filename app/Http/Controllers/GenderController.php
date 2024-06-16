<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = Gender::all();
        $classifications = Classification::all();
        return view('components.admin.category_gender', compact('genders','classifications'));
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
            'name' => 'required|max:100',
            'genderDescription' => 'required',
        ]);

        if ($validatedData) {
            $gender = Gender::create([
                'name' => $request['name'],
                'description' => $request['genderDescription']
            ]);

            if ($gender != null) {
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
            'idGender' => 'required',
            'updateName' => 'required|max:30',
            'updateGenderDescription' => 'required',
        ]);

        if ($validatedData) {
            $gender = Gender::find($request['idGender']);

            if ($gender) {
                $gender->update([
                    'name' => $request['updateName'],
                    'description' => $request['updateGenderDescription']
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
            'idGenderDelete' => 'required',
        ]);

        if($validatedData){
            $gender = Gender::find($request['idGenderDelete']);
            if($gender){
                Gender::destroy($request['idGenderDelete']);
                return redirect()->route('gender.index');
            }
        }
    }
}
