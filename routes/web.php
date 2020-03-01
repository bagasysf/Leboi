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
Route::get('home/{id}/Haircut', 'HomeController@pomade')->name('home.haircut')->middleware('role:barberman|admin');
Route::get('home/{id}/Pomade', 'HomeController@pomade')->name('home.pomade')->middleware('role:barberman|admin');
Route::get('home/{id}/Shaving', 'HomeController@shaving')->name('home.shaving')->middleware('role:barberman|admin');
Route::get('home/{id}/Hair Wash', 'HomeController@hairwash')->name('home.hairwash')->middleware('role:barberman|admin');
Route::get('home/{id}/Massage', 'HomeController@massage')->name('home.massage')->middleware('role:barberman|admin');

Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('role:cashier|admin');
Route::get('unrole', 'UnroleController@index')->name('unrole')->middleware('define_role');

Route::get('packages', 'PackageController@index')->name('package')->middleware('role:admin|cashier');
Route::get('packages/create', 'PackageController@create')->name('package.create')->middleware('role:admin');
Route::post('packages', 'PackageController@store')->name('package.store')->middleware('role:admin');
Route::get('packages/{id}/edit', 'PackageController@edit')->name('package.edit')->middleware('role:admin');
Route::put('packages/{id}', 'PackageController@update')->name('package.update')->middleware('role:admin');
Route::delete('/packages/{id}', 'PackageController@destroy')->name('package.destroy')->middleware('role:admin');


Route::get('categories/', 'CategoryController@index')->name('category')->middleware('role:admin|cashier');
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
Route::delete('products/{id}', 'ProductController@destroy')->name('product.destroy')->middleware('role:admin');


Route::post('add-to-cart/{id}', 'CartController')->name('cart');

Route::get('checkout/', 'CheckOutController@index')->name('checkout');
Route::post('checkout/{id}', 'CheckOutController@payment')->name('checkout.payment');
Route::get('checkout/{id}/edit', 'CheckOutController@edit')->name('checkout.edit')->middleware('role:admin');
Route::delete('checkout/{id}', 'CheckOutController@destroy')->name('checkout.destroy')->middleware('role:admin');

Route::get('orders', 'OrderController@index')->name('orders')->middleware('role:cashier|admin');
Route::get('orders/{id}/view', 'OrderController@view')->name('orders.view')->middleware('role:cashier|admin');
Route::post('orders/{id}', 'OrderController@payed')->name('orders.payed')->middleware('role:cashier|admin');
Route::post('orders/{id}/cancel', 'OrderController@cancel')->name('orders.cancel')->middleware('role:cashier|admin');

Route::get('users', 'UserController@index')->name('users')->middleware('role:admin');

Route::get('user-roles', 'UserRoleController@index')->name('user-roles')->middleware('role:admin');

Route::get('user-permissions', 'UserPermissionController@index')->name('user-permissions')->middleware('role:admin');

Route::get('orders/export/', 'TransactionController@export');
Route::get('users/export/', 'UserController@export');

Route::get('sales', 'SalesController@index')->name('sales')->middleware('role:admin');


