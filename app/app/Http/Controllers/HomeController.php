<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function firstRoute()
    {
        echo "Email anda telah verified";
    }

    public function secondRoute()
    {
        echo "Email anda telah verified dan anda mempunyai hak akses sebagai admin";
    }
}
