<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::query()
            ->orderBy('companyName')
            ->get();
        return view('client', ['clients' => $clients, 'layout' => 'index',]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('client', ['clients' => $clients, 'layout' => 'create',]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->companyName = $request->input('companyName');
        $client->firstName = $request->input('firstName');
        $client->lastName = $request->input('lastName');
        $client->phoneNumber = $request->input('phoneNumber');
        $client->address = $request->input('search-address');

        $client->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        $clients = Client::all();
        return view('client', ['clients' => $clients, 'client' => $client, 'layout' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        $clients = Client::all();

        return view('client', ['clients' => $clients, 'client' => $client,  'layout' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client->companyName = $request->input('companyName');
        $client->firstName = $request->input('firstName');
        $client->lastName = $request->input('lastName');
        $client->phoneNumber = $request->input('phoneNumber');
        $client->address = $request->input('address');

        $client->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $client = Client::find($id);
        $client->delete();
        return redirect('/');
    }
}
