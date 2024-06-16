<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $benefits = Benefit::all();
       $memberships = Membership::with(['benefits'])->get();

       return view('components.admin.memberships', compact('benefits', 'memberships'));
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
                'name' => 'required|max:30',
                'genderDescription' => 'required',
            ]);
    
            if ($validatedData) {
                Benefit::create([
                    'name' => $request['name'],
                    'description' => $request['genderDescription']
                ]);

                return redirect()->route('membership.index');
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
                'idBenefit' => 'required|int',
                'updateName' => 'required|max:30',
                'updateBenefitDescription' => 'required',
            ]);
    
            if ($validatedData) {
                $benefit = Benefit::find($request['idBenefit']);
                $benefit->update([
                    'name' => $request['updateName'],
                    'description' => $request['updateBenefitDescription']
                ]);

                return redirect()->route('membership.index');
            }
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage() . ' on line ' . $th->getLine();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|int',
            ]);
    
            if ($validatedData) {
                $benefit = Benefit::find($request['id']);

                if($benefit){
                    Benefit::destroy($request['id']);
                    return redirect()->route('membership.index');
                }
            }
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage() . ' on line ' . $th->getLine();
        }
    }
}
