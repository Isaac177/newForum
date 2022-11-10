
<?php

use App\Http\Controllers\Pages\TagController;
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
//edit
Route::get('/forum/threads/{thread:slug}/edit', [ThreadController::class, 'edit'])->name('threads.edit');
Route::get('/forum/threads/{category:slug}/{thread:slug}', [ThreadController::class, 'show'])->name('threads.show');
//tag
Route::get('/forum/threads/tag/{tag:slug}', [TagController::class, 'index'])->name('threads.tags.index');


Route::get('dashboard/users', [PageController::class, 'users'])->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
