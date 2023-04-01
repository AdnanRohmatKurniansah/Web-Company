<?php

use App\Models\Contact;
use App\Models\Slide;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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
        'title' => "Home",
        'slides' => Slide::all()
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


Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);


Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/change-password', [AuthController::class, 'show'])->name('change-password');
    Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password');
});

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/index', function () {
        return view('dashboard.index', [
            'contacts' => Contact::all()
        ]);
    });
    Route::resource('/dashboard/slides', SlideController::class)->except('show');
    Route::resource('/dashboard/services', ServiceController::class)->except('show');
    Route::resource('/dashboard/portfolios', PortfolioController::class)->except('show');
    Route::resource('/dashboard/abouts', AboutController::class)->except('show');
    Route::resource('/dashboard/teams', TeamController::class)->except('show');
    Route::resource('/dashboard/categories', CategoryController::class)->except('show');
    Route::get('/dashboard/categories/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/blogs', BlogController::class)->except('show');
    Route::get('/dashboard/blogs/checkSlug', [BlogController::class, 'checkSlug']);
});
