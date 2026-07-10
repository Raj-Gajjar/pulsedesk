<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')){

            $data['logo'] = $request->file('logo')
                                    ->store('clients', 'public');
        }

        Client::create($data);

        return redirect()
                ->route('clients.index')
                ->with('success', 'Client Created Successfully');

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
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreClientRequest $request, Client $client)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')){

            $data['logo'] = $request->file('logo')
                                    ->store('clients', 'public');
        }

        $client->update();

        return redirect()
                ->route('clients.index')
                ->with('success', 'Client Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
