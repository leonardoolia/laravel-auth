<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function __invoke()
    {
        $projects = Project::orderByDesc('created_at')->limit(5)->get();
        return view('guest.home', compact('projects'));
    }
}
