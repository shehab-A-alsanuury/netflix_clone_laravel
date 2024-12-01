<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\GenresController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ActorsController;


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Route for displaying the movie creation form
    Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');
    
    // Other routes for movies...
    Route::post('movies', [MovieController::class, 'store'])->name('movies.store');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('movies', MovieController::class);
    Route::resource('genres', GenresController::class);
    Route::resource('actors', ActorsController::class);
    Route::resource('categories', CategoriesController::class);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/actors', [ActorsController::class, 'index'])->name('admin.actors.index');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/movies', [MovieController::class, 'index'])->name('admin.movies.index');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'auth.role'])->name('dashboard');
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified', 'auth.role'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
