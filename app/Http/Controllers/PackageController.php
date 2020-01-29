<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Packages Page';
        $header = 'Packages';
        $packages = Package::paginate(8);
        return view('packages/index', [
            'title' => $title,
            'header' => $header,
            'packages' => $packages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Packages Page';
        $header = 'New Package';
        return view('packages/create', [
            'title' => $title,
            'header' => $header,
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
        // dapetin request dari form
        // dd(request()->all());

        Package::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Package $package)
    {
        $title = 'Packages Page';
        $header = 'Edit Package';
        $packages = Package::where('id', $id)->first();
        return view('packages.edit', [
            'title' => $title,
            'header' => $header,
            'packages' => $packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package, $id)
    {
        $packages = Package::where('id', $id)->first();
        $packages->update([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('/packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package, $id)
    {
        $packages = Package::where('id', $id)->first();
        $packages->delete();

        return redirect('/packages');
    }
}
