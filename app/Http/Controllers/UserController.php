<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with(['membership'])->get();
        $memberships = Membership::all();
        return view('components.admin.users', compact('clients','memberships'));
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
                'name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|max:20',
                'membership' => 'exists:memberships,id',
            ]);
    
            if ($validatedData) {
                Client::create([
                    'given_name' => $request['name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'membership_id' => $request['membership']
                ]);

                return redirect()->route('client.index');
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
                'updateId' => 'required|int',
                'updateName' => 'required|max:50',
                'updateLastNname' => 'required|max:50',
                'updateEmail' => 'required|email',
                'updateMembership' => 'exists:memberships,id',
            ]);
    
            if ($validatedData) {
                $client = Client::find($request['updateId']);

                $client->update([
                    'given_name' => $request['updateName'],
                    'last_name' => $request['updateLastNname'],
                    'email' => $request['updateEmail'],
                    'membership_id' => $request['updateMembership']
                ]);

                return redirect()->route('client.index');
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
                'idDelete' => 'required|int',
            ]);
    
            if ($validatedData) {
                $client = Client::find($request['idDelete']);

                if($client){
                    Client::destroy($request['idDelete']);
                    return redirect()->route('client.index');
                }
            }
        } catch (\Throwable $th) {
            echo 'Error: ' . $th->getMessage() . ' on line ' . $th->getLine();
        }
    }
}
