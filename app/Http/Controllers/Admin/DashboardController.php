<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Response;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'permission:dashboard.view',
        ];
    }

    public function index()
    {
        $totalClients = Client::count();

        $totalSurveys = Survey::count();

        $publishedSurveys = Survey::where('status', 'published')->count();

        $draftSurveys = Survey::where('status', 'draft')->count();

        $totalResponses = Response::count();

        $totalUsers = User::count();

        $recentSurveys = Survey::with('client')
            ->latest()
            ->take(5)
            ->get();

        $recentResponses = Response::with('survey')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(

            'totalClients',

            'totalSurveys',

            'publishedSurveys',

            'draftSurveys',

            'totalResponses',

            'totalUsers',

            'recentSurveys',

            'recentResponses',

        ));
    }

}
