<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $responses = Response::query()
                ->with(['survey',])
                ->latest()
                ->paginate(5);

            return view('admin.responses.index', compact('responses'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        $response->load([
            'survey',
            'answers.question',
        ]);

        return view('admin.responses.show', compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        DB::beginTransaction();

        try {

            $response->delete();

            DB::commit();

            return redirect()
                ->route('responses.index')
                ->with('success', 'Response deleted successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->with('error', 'Unable to delete response.');
        }
    }

}
