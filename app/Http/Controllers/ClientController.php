<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\delete;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::query()
            ->latest()
            ->paginate(5);

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

        try {

            DB::transaction(function () use($request) {

                $logo = null;

                if($request->hasFile('logo')){
                    $logo = $request->file('logo')
                        ->store('clients', 'public');
                }

                Client::create([
                    'company_name'   => $request->company_name,

                    'contact_person' => $request->contact_person,

                    'email'          => $request->email,

                    'phone'          => $request->phone,

                    'logo'           => $logo,

                    'website'        => $request->website,

                    'address'        => $request->address,

                    'status'         => $request->status,
                ]);

            });

            return redirect()
                ->route('clients.index')
                ->with('success', 'Client created successfully.');


         } catch (\Throwable $e) {

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while creating the client.');

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
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        
        try{

            DB::transaction(function () use($request, $client){

                $logo = $client->logo;

                if ($request->hasFile('logo')){
                    
                    if ($client->logo && storage::disk('public')->exists($client->logo)){

                        storage::disk('public')->delete($client->logo);

                    }

                    $logo = $request->file('logo')
                        ->store('clients', 'public');
                }

                $client->update([

                    'company_name'   => $request->company_name,

                    'contact_person' => $request->contact_person,

                    'email'          => $request->email,

                    'phone'          => $request->phone,

                    'logo'           => $logo,

                    'website'        => $request->website,

                    'address'        => $request->address,

                    'status'         => $request->status,
                ]);

            });

            return redirect()
                ->route('clients.index')
                ->with('success', 'Client updated successfully.');

        }catch (\Throwable $e){

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while updating the client.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try{

            DB::transaction(function () use($client) {

                if ($client->logo && storage::disk('public')->exists($client->logo)){

                    storage::disk('public')->delete($client->logo);

                }

                $client->delete();

            });

            return redirect()
                ->route('clients.index')
                ->with('success', 'Client Deleted successfully.');

        }catch (\Throwable $e){

            report($e);

            return back()
                ->with('error', 'Something went wrong while deleting the client.');

        }
    }
}
