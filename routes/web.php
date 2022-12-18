
<?php

use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Pages\ProfileController;
use App\Http\Controllers\Pages\ReplyController;
use App\Http\Controllers\Pages\TagController;
use App\Http\Controllers\Pages\ThreadController;
use Illuminate\Http\Request;
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
Route::get('/forum/threads/{thread:slug}/edit', [ThreadController::class, 'edit'])->name('threads.edit');
Route::post('/forum/threads/{thread:slug}', [ThreadController::class, 'update'])->name('threads.update');
Route::get('/forum/threads/{category:slug}/{thread:slug}', [ThreadController::class, 'show'])->name('threads.show');

Route::get('/forum/threads/{category:slug}/{thread:slug}/subscribe', [ThreadController::class, 'subscribe'])
    ->name('threads.subscribe');
Route::get('/forum/threads/{category:slug}/{thread:slug}/unsubscribe', [ThreadController::class, 'unsubscribe'])
    ->name('threads.unsubscribe');

Route::get('/forum/threads/tag/{tag:slug}', [TagController::class, 'index'])->name('threads.tags.index');

Route::group(['prefix' => 'replies', 'as' => 'replies.'], function () {
    Route::post('/', [ReplyController::class, 'store'])->name('store');
    Route::post('/{reply}', [ReplyController::class, 'show'])->name('show');
    Route::get('reply/{id}/{type}', [ReplyController::class, 'redirect'])->name('replyAble');
});

Route::get('dashboard/users', [PageController::class, 'users'])->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function(){
        Route::get('/', [NotificationController::class, 'index'])->name('index');
    });
});

Route::get('users/{user:username}', [ProfileController::class, 'show'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route [verification.notice]

/*
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//verification.send route

Route::GET('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');*/

