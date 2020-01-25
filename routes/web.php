<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth/login');
})->middleware('guest');

// Check apakah bootstrap sudah berjalan properly
Route::get('/layouts-login', function () {
    return view('layouts/login');
});
Route::get('/layouts-register', function () {
    return view('layouts/register');
});
Route::get('/layouts-dashboard', function () {
    return view('layouts/dashboard');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home')->middleware('role:barberman|admin');
Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('role:cashier|admin');
Route::get('unrole', 'UnroleController@index')->name('unrole')->middleware('define_role');

Route::get('packages', 'PackageController@index')->name('package')->middleware('role:admin');
Route::get('packages/create', 'PackageController@create')->name('package.create')->middleware('role:admin');
Route::post('/packages', 'PackageController@store')->name('package.store')->middleware('role:admin');
Route::get('/packages/{id}/edit', 'PackageController@edit')->name('package.edit')->middleware('role:admin');
Route::put('/packages/{id}', 'PackageController@update')->name('package.update')->middleware('role:admin');
Route::delete('/packages/{id}', 'PackageController@destroy')->name('package.destroy')->middleware('role:admin');


Route::get('/categories', 'CategoryController@index')->name('category')->middleware('role:admin');
Route::get('categories/create', 'CategoryController@create')->name('category.create')->middleware('role:admin');
Route::get('/categories', 'CategoryController@store')->name('category.store')->middleware('role:admin');
