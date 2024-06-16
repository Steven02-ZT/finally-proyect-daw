<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
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
        try {
            $validatedData = $request->validate([
                'level' => 'required|max:30',
                'price' => 'required|numeric|between:0,99.99',
                'ClassificationDescription' => 'required',
                'benefits' => 'required|array',
                'benefits.*' => 'exists:benefits,id',
            ]);
    
            if ($validatedData) {
                $membership = Membership::create([
                    'level' => $request['level'],
                    'price' => $request['price'],
                    'description' => $request['ClassificationDescription']
                ]);

                if ($request->has('benefits')) {
                    $membership->benefits()->attach($request['benefits']);
                }

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
                'updateIdMembership' => 'required|int',
                'updateLevel' => 'required|max:30',
                'updatePrice' => 'required|numeric|between:0,99.99',
                'updateMembershipDescription' => 'required',
                'benefitsUpdate' => 'required|array',
                'benefitsUpdate.*' => 'exists:benefits,id',
            ]);
    
            if ($validatedData) {
                $membership = Membership::find($request['updateIdMembership']);

                $membership->update([
                    'level' => $request['updateLevel'],
                    'price' => $request['updatePrice'],
                    'description' => $request['updateMembershipDescription']
                ]);

                if ($request->has('benefitsUpdate')) {
                    $membership->benefits()->sync($request['benefitsUpdate']);
                }

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
                'idMembershipDelete' => 'required|int',
            ]);
    
            if ($validatedData) {
                $membership = Membership::find($request['idMembershipDelete']);

                if($membership){
                    Membership::destroy($request['idMembershipDelete']);
                    return redirect()->route('membership.index');
                }
            }
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage() . ' on line ' . $th->getLine();
        }
    }
}
