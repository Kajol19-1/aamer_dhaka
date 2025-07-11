<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commonController extends Controller
{
    public function home(){
        return view('commonDashboard.home');
    }

    public function aboutUs(){
        return view('commonDashboard.aboutUs');
    }
    public function contactUs(){
        return view('commonDashboard.contactUs');
    }
}
