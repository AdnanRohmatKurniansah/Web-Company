<?php

use App\Http\Controllers\CustomerController;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Team;
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
        'slides' => Slide::all(),
        'abouts' => About::all(),
        'services' => Service::all(),
        'portfolios' => Portfolio::latest()->paginate(6),
        'blogs' => Blog::all()
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => "About",
        'abouts' => About::all(),
        'teams' => Team::all(), 
        'customers' => Customer::all()
    ]);
});

Route::get('/services', function () {
    return view('services', [
        'title' => "Services",
        'services' => Service::all(),
        'customers' => Customer::all(),
        'abouts' => About::all()
    ]);
});

Route::get('/portfolio', function () {
    return view('portfolio', [
        'title' => "Portfolio",
        'portfolios' => Portfolio::latest()->paginate(6),
        'abouts' => About::all()
    ]);
});

Route::get('/blog', function () {
    return view('blog', [
        'title' => "Blog",
        'blogs' => Blog::latest()->with('category')->filter(request(['search', 'category']))
        ->paginate(3)->withQueryString(),
        'categories' => Category::all(),
        'abouts' => About::all()
    ]);
});

Route::get('/blog/{blog:slug}', function (Blog $blog) {
    return view('blogDetail', [
        'title' => "Blog Detail",
        // 'blogs' => Blog::all(),
        'categories' => Category::all(),
        'blog' => $blog,
        'abouts' => About::all()
    ]);
});


Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);


Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/index', function () {
        return view('dashboard.index', [
            'messages' => Contact::where('status', 'unread')->get(),
            'portfolios' => Portfolio::count(),
            'services' => Service::count(),
            'blogs' => Blog::count(),
            'teams' => Team::count()
        ]);
    });

    Route::get('/dashboard/contacts', [ContactController::class, 'index']);
    Route::get('/dashboard/contacts/{contact:id}', [ContactController::class, 'show']);
    Route::delete('/dashboard/contacts/{contact:id}', [ContactController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard/change-password', [AuthController::class, 'show'])->name('change-password');
    Route::post('dashboard/change-password', [AuthController::class, 'updatePassword'])->name('update-password');
    Route::get('/dashboard/register', [AuthController::class, 'register'])->name('add-admin');
    Route::post('/dashboard/register', [AuthController::class, 'store'])->name('create-admin');


    Route::resource('/dashboard/slides', SlideController::class)->except('show');
    Route::resource('/dashboard/services', ServiceController::class)->except('show');
    Route::resource('/dashboard/portfolios', PortfolioController::class)->except('show');
    Route::resource('/dashboard/abouts', AboutController::class)->except('show');
    Route::resource('/dashboard/teams', TeamController::class)->except('show');
    Route::resource('/dashboard/categories', CategoryController::class)->except('show');
    Route::get('/dashboard/categories/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/blogs', BlogController::class)->except('show');
    Route::get('/dashboard/blogs/checkSlug', [BlogController::class, 'checkSlug']);
    Route::resource('/dashboard/customers', CustomerController::class)->except('show');
});
