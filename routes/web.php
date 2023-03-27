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
    return view('home', [
        'title' => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => "About"
    ]);
});

Route::get('/services', function () {
    return view('services', [
        'title' => "Services"
    ]);
});

Route::get('/portfolio', function () {
    return view('portfolio', [
        'title' => "Portfolio"
    ]);
});

Route::get('/blog', function () {
    return view('blog', [
        'title' => "Blog"
    ]);
});
Route::get('/contact', function () {
    return view('contact', [
        'title' => "Contact"
    ]);
});

Route::get('/auth/login', function () {
    return view('auth.login', [
        'title' => "Login"
    ]);
});