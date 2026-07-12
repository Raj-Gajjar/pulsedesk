<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Response;
use App\Models\Survey;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [

            'clients' => Client::count(),

            'surveys' => Survey::count(),

            'published' => Survey::where('status', 'published')->count(),

            'draft' => Survey::where('status', 'draft')->count(),

            'closed' => Survey::where('status', 'closed')->count(),

            'responses' => Response::count(),

        ];

        return view('admin.dashboard', compact('stats'));
    }

}
