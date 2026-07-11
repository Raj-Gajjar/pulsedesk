<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResponseRequest;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Response;
use Illuminate\Support\Facades\DB;

class PublicSurveyController extends Controller
{
    public function show(Survey $survey)
    {
            $survey->load([
                'client',
                'questions.options',
            ]);

            abort_if($survey->status !== 'published', 404);

            return view('public.surveys.show', compact('survey'));
    }

    public function store(StoreResponseRequest $request, Survey $survey)
    {
        try{

            DB::transaction(function () use($request, $survey) {

                $response = Response::create([

                    'survey_id' => $survey->id,

                    'respondent_name' => $request->respondent_name,

                    'respondent_email' => $request->respondent_email,

                    'ip_address' => $request->ip(),

                ]);

                foreach ($survey->questions as $question) {

                    $answer = $request->answers[$question->id] ?? null;

                    if (is_array($answer)) {
                        $answer = json_encode($answer);
                    }

                    $response->answers()->create([

                        'question_id' => $question->id,

                        'answer' => $answer,

                    ]);
                }

            });

            return redirect()
                ->route('public-surveys.show', $survey)
                ->with('success', 'Thank you! Your response has been submitted successfully.');

        }catch (\Throwable $e){

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while submitting your response.');

        }
    }
}
