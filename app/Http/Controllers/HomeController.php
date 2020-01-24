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
        $this->middleware('role:barberman|admin');
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function unrole()
    {
        return view('unrole');
    }
}
