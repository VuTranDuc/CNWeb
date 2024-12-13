<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Issue;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $computers = Computer::all();
        $issues = Issue::all();

        return view('home', compact('computers', 'issues'));
    }
}

