<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Survey;
use App\Models\Response;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ReportsController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [

            new Middleware('permission:reports.view'),

        ];
    }

    public function index()
    {
        $stats = [

            'clients' => Client::count(),

            'surveys' => Survey::count(),

            'published_surveys' => Survey::where('status', 'published')->count(),

            'draft_surveys' => Survey::where('status', 'draft')->count(),

            'closed_surveys' => Survey::where('status', 'closed')->count(),

            'responses' => Response::count(),

            'average_responses' => Survey::count() > 0
                ? round(Response::count() / Survey::count(), 2)
                : 0,

        ];

        $surveys = Survey::query()
            ->with('client')
            ->withCount('responses')
            ->latest()
            ->paginate(10);

        return view('admin.reports.index', compact('stats', 'surveys'));
    }

    public function show(Survey $survey)
    {
        $survey->load([
            'client',
            'questions.options',
            'responses.answers.question',
        ]);

        return view('admin.reports.show', compact('survey'));
    }
    
}
