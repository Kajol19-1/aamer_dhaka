<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class residentController extends Controller
{
    public function residentHome()
    {
        return view('residentDashboard.residentHome');
    }

    public function contact()
    {
        return view('residentDashboard.contact');
    }

    public function about()
    {
        return view('residentDashboard.about');
    }
}
