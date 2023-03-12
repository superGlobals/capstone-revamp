<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        return view('frontpage.index');
    }

    public function registerChoose()
    {
        return view('frontpage.choose-register');
    }

    public function registerStudent()
    {
        return view('frontpage.student-register');
    }
}
