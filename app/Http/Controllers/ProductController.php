<?php

namespace App\Http\Controllers;

use App\Product;
use App\Package;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Products Page';
        $header = 'Products';
        $products = Product::paginate(8);
        return view('products.index', [
            'title' => $title,
            'header' => $header,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Products Page';
        $header = 'New Product';
        $packages = Package::all();
        $categories = Category::all();
        return view('products/create', [
            'title' => $title,
            'header' => $header,
            'packages' => $packages,
            'categories' => $categories,
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
        $check = request()->hasFile('image');
        if ($check) {
            $image = request('image');
            $filenameRandom = \Str::random(20) . '.' . $image->getClientOriginalExtension(); //extension gambar asli
            $image->move(public_path('images/'), $filenameRandom);
        } else {
            $defaultphoto = 'default-product.png';
        }

        Product::create([
            'category_id' => request('category_id'),
            'name' => request('name'),
            'price' => request('price'),
            'image' => $check ? $filenameRandom : $defaultphoto,
            'description' => request('description'),
        ]);

        return redirect('products/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $title = 'Products Page';
        $header = 'Edit Product';
        $products = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('products.edit', [
            'title' => $title,
            'header' => $header,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::where('id', $id)->first();

        $check = request()->hasFile('image');

        if ($check) {
            $imagePath = public_path() . '/images/' . $product->image;
            unlink($imagePath);

            //import data yang baru
            $image = request('image');
            $filenameRandom = \Str::random(20) . '.' . $image->getClientOriginalExtension(); //extension gambar asli
            $image->move(public_path('images'), $filenameRandom);
        }

        $product->update([
            'category_id' => request('category_id'),
            'name' => request('name'),
            'price' => request('price'),
            'image' => $check ? $filenameRandom : $product->image,
            'description' => request('description'),
        ]);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
