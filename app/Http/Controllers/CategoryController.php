<?php

namespace App\Http\Controllers;

use App\Category;
use App\Package;
use App\Kernel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Category Page';
        $header = 'Categories';
        $categories = Category::paginate(8);
        return view('categories.index', [
            'title' => $title,
            'header' => $header,
            'categories' => $categories,
        ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Categories Page';
        $header = 'New Category';
        $packages = Package::all();
        return view('categories.create', [
            'title' => $title,
            'header' => $header,
            'packages' => $packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());

        Category::create([
            'package_id' => request('package_id'),
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $title = "Categories Page";
        $header = "Edit Category";
        $categories = Category::where('id', $id)->first();
        $packages = Package::all();
        return view('categories.edit', [
            'title' => $title,
            'header' => $header,
            'categories' => $categories,
            'packages' => $packages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $categories = Category::where('id', $id)->first();
        $categories->update([
            'package_id' => request('package_id'),
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();

        return redirect('/categories');
    }
}
