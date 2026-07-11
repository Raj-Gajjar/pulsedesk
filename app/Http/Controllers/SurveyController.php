<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\User;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $surveys = Survey::with('client')
            ->withCount('responses')
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');})
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);})
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.surveys.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::query()
            ->where('status', true)
            ->orderBy('company_name', 'ASC')
            ->get();

        return view('admin.surveys.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurveyRequest $request)
    {
        try {

            DB::transaction(function () use ($request) 
            {

                $survey = Survey::create([
                    'client_id'   => $request->client_id,
                    'title'       => $request->title,
                    'description' => $request->description,
                    'slug'        => Str::slug($request->title) . '-' . time(),
                    'status'      => $request->status,
                ]);

                foreach ($request->questions as $questionIndex => $questionData) 
                {

                    $question = $survey->questions()->create([
                        'question'   => $questionData['question'],
                        'type'       => $questionData['type'],
                        'required'   => isset($questionData['required']),
                        'sort_order' => $questionIndex,
                    ]);

                    if (!empty($questionData['options'])) 
                    {

                        foreach ($questionData['options'] as $optionIndex => $option) 
                        {

                            if (trim($option) === '') {
                                continue;
                            }

                            $question->options()->create([
                                'option'     => $option,
                                'sort_order' => $optionIndex,
                            ]);
                        }
                    }
                }

            });

            return redirect()
                ->route('surveys.index')
                ->with('success', 'Survey created successfully.');

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while creating the survey.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        $survey->load('questions.options');

        $clients = Client::query()->where('status', 1)->get();

        return view('admin.surveys.edit', compact(
            'survey',
            'clients'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyRequest $request, Survey $survey)
    {
        try {

            DB::transaction(function () use ($request, $survey) {

                $survey->update([
                    'client_id'   => $request->client_id,
                    'title'       => $request->title,
                    'description' => $request->description,
                    'status'      => $request->status,
                ]);

                // Delete old questions
                $survey->questions()->delete();

                // Create new questions
                foreach ($request->questions as $questionIndex => $questionData) {

                    $question = $survey->questions()->create([
                        'question'   => $questionData['question'],
                        'type'       => $questionData['type'],
                        'required'   => isset($questionData['required']),
                        'sort_order' => $questionIndex,
                    ]);

                    // Create options
                    if (!empty($questionData['options'])) {

                        foreach ($questionData['options'] as $optionIndex => $option) {

                            if (trim($option) === '') {
                                continue;
                            }

                            $question->options()->create([
                                'option'     => $option,
                                'sort_order' => $optionIndex,
                            ]);
                        }
                    }
                }
            });

            return redirect()
                ->route('surveys.index')
                ->with('success', 'Survey updated successfully.');

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while updating the survey.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        try {

            DB::transaction(function () use ($survey) {

                $survey->delete();

            });

            return redirect()
                ->route('surveys.index')
                ->with('success', 'Survey deleted successfully.');

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->with('error', 'Unable to delete survey.');
        }
    }
}
