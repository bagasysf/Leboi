<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        $products = Product::where('category_id', 1)->get();
        return view('home/index', [
            'title' => $title,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function pomade($id)
    {
        // $this->middleware('role:barberman|admin');
        $title = 'Home Page';
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        return view('home/index', [
            'title' => $title,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function haircut($id)
    {
        // $this->middleware('role:barberman|admin');
        $title = 'Home Page';
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        return view('home/index', [
            'title' => $title,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function shaving($id)
    {
        // $this->middleware('role:barberman|admin');
        $title = 'Home Page';
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        return view('home/index', [
            'title' => $title,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function hairwash($id)
    {
        // $this->middleware('role:barberman|admin');
        $title = 'Home Page';
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        return view('home/index', [
            'title' => $title,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function massage($id)
    {
        // $this->middleware('role:barberman|admin');
        $title = 'Home Page';
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        return view('home/index', [
            'title' => $title,
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
