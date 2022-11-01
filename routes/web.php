
<?php

use App\Http\Controllers\Pages\ThreadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages\HomeController;


require 'admin.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forum', [HomeController::class, 'index'])->name('home');
Route::get('/forum/threads', [ThreadController::class, 'index'])->name('threads.index');
Route::get('/forum/threads/create', [ThreadController::class, 'create'])->name('threads.create');
Route::post('/forum/threads', [ThreadController::class, 'store'])->name('threads.store');
Route::get('/forum/threads/{category:slug}/{thread:slug}', [ThreadController::class, 'show'])->name('threads.show');

Route::get('dashboard/users', [PageController::class, 'users'])->name('users');
/*Route::get('/dashboard/categories/index', [PageController::class, 'categoriesIndex'])->name('categories.index');*/
/*Route::get('/dashboard/categories/create', [PageController::class, 'categoriesCreate'])->name('categories.create');*/

/*Route::get('/dashboard/threads/index', [PageController::class, 'threadsIndex'])->name('threads.index');
Route::get('/dashboard/threads/create', [PageController::class, 'threadsCreate'])->name('threads.create');*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
