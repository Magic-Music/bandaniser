<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('members', function () {
    return view('members');
});

Route::get('gigs', function () {
    return view('gigs');
});

Route::get('venues', function () {
    return view('venues');
});

Route::get('agencies', function () {
    return view('agencies');
});
