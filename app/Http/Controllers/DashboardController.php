<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Kernel;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Dashboard Page";
        return view('dashboard/index', [
            'title' => $title,
        ]);
    }
}
