<?php

namespace App\Http\Controllers;

use App\Category;
use app\Http\Kernel;

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
        // $this->middleware('role:barberman|admin');
        $title = 'Home Page';
        $categories = Category::all();
        return view('home/home', [
            'title' => $title,
            'categories' => $categories,
        ]);
    }
}
