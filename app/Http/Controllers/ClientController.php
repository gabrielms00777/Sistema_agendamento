<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::query()->with('user')->paginate(10);
        return view('dashboard.client.index', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,email',
            'phone' => 'required|numeric',
            'whatsapp' => 'required|numeric',
        ]);
        $data['password'] = 'password';
        // dd($data);
        
        $user = User::query()->create($data);
        // dd($user);
        $client = Client::query()->create(['user_id' => $user->id]);

        if($user && $client){

            return to_route('client.index')->with('success', 'Cliente cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('dashboard.client.edit', [
            'client' => $client->with('user')->find($client->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,email,'.$client->user->id,
            'phone' => 'required|numeric',
            'whatsapp' => 'required|numeric',
        ]);

        if($client->user()->update($data)){
            return to_route('client.index')->with('success', 'Cliente editado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
