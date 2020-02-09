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
Route::post('packages', 'PackageController@store')->name('package.store')->middleware('role:admin');
Route::get('packages/{id}/edit', 'PackageController@edit')->name('package.edit')->middleware('role:admin');
Route::put('packages/{id}', 'PackageController@update')->name('package.update')->middleware('role:admin');
Route::delete('/packages/{id}', 'PackageController@destroy')->name('package.destroy')->middleware('role:admin');


Route::get('categories/', 'CategoryController@index')->name('category')->middleware('role:admin');
Route::get('categories/create', 'CategoryController@create')->name('category.create')->middleware('role:admin');
Route::post('categories/', 'CategoryController@store')->name('category.store')->middleware('role:admin');
Route::get('categories/{id}/edit', 'CategoryController@edit')->name('category.edit')->middleware('role:admin');
Route::put('categories/{id}', 'CategoryController@update')->name('category.update')->middleware('role:admin');
Route::delete('categories/{id}', 'CategoryController@destroy')->name('category.destroy')->middleware('role:admin');
// Route::resource('categories', 'CategoryController');

Route::get('products/', 'ProductController@index')->name('product')->middleware('role:cashier|admin');
Route::get('products/create', 'ProductController@create')->name('product.create')->middleware('role:cashier|admin');
Route::post('products/', 'ProductController@store')->name('product.store')->middleware('role:cashier|admin');
Route::get('products/{id}/edit', 'ProductController@edit')->name('product.edit')->middleware('role:cashier|admin');
Route::put('products/{id}', 'ProductController@update')->name('product.update')->middleware('role:cashier|admin');

Route::post('add-to-cart/{id}', 'CartController')->name('cart');

Route::get('checkout/', 'CheckOutController@index')->name('checkout');
Route::post('checkout/{id}', 'CheckOutController@payment')->name('checkout.payment');
