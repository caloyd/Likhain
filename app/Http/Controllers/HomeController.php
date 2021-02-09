<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('guest',['auth', '2fa']);
    }

    public function index()
    {
        return view('home');
    }
}
