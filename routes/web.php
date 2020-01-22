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

// Auth::routes();
Route::get('home', 'HomeController@index')->name('home')->middleware('role:barberman|admin');
Route::get('dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('role:cashier|admin');
Route::get('unrole', 'HomeController@unrole')->name('unrole')->middleware('define_role');
Route::get('login', 'Auth\\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\\LoginController@login');
Route::post('logout', 'Auth\\LoginController@logout')->name('logout');;
Route::get('password/confirm', 'Auth\\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\\ConfirmPasswordController@confirm');
Route::post('password/email', 'Auth\\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\\ResetPasswordController@reset')->name('password.update');
Route::get('password/reset/{token}', 'Auth\\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('register', 'Auth\\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\\RegisterController@register');
