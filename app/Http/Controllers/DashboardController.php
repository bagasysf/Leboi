<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\User;
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
        $header = "Dashboard";
        $transactions = Transaction::where('status', 'payed');
        $totalTransaction = $transactions->count();
        $products = Product::all();
        $totalProduct = $products->count();
        $users = User::all();
        $totalUser = $users->count();
        return view('dashboard/index', [
            'title' => $title,
            'header' => $header,
            'totalTransaction' => $totalTransaction,
            'totalProduct' => $totalProduct,
            'totalUser' => $totalUser,
        ]);
    }
}
