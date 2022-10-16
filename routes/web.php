
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages\HomeController;


require 'admin.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forum', [HomeController::class, 'index'])->name('home');

Route::get('/category/discussion/topic', [PageController::class, 'single'])->name('single');

Route::get('discussion/create', [PageController::class, 'create'])->name('create');

Route::get('dashboard/users', [PageController::class, 'users'])->name('users');

Route::get('/dashboard/categories/index', [PageController::class, 'categoriesIndex'])->name('categories.index');
Route::get('/dashboard/categories/create', [PageController::class, 'categoriesCreate'])->name('categories.create');

Route::get('/dashboard/threads/index', [PageController::class, 'threadsIndex'])->name('threads.index');
Route::get('/dashboard/threads/create', [PageController::class, 'threadsCreate'])->name('threads.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
