<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeamController;
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


Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/index', function () {
        return view('dashboard.index');
    });
    Route::resource('/dashboard/slides', SlideController::class)->except('show');
    Route::resource('/dashboard/services', ServiceController::class)->except('show');
    Route::resource('/dashboard/portfolios', PortfolioController::class)->except('show');
    Route::resource('/dashboard/abouts', AboutController::class)->except('show');
    Route::resource('/dashboard/teams', TeamController::class)->except('show');
    Route::resource('/dashboard/categories', CategoryController::class)->except('show');
    Route::get('/dashboard/categories/checkSlug', [CategoryController::class, 'checkSlug']);
});
