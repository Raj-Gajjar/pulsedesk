<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalSurveys' => 0,
            'totalResponses' => 0,
            'totalClients' => 0,
            'averageRating' => 0,
        ];

        return view('admin.dashboard', compact('data'));
    }
}
