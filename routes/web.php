
<?php

use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Pages\ReplyController;
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
Route::get('/forum/threads/{thread:slug}/edit', [ThreadController::class, 'edit'])->name('threads.edit');
Route::post('/forum/threads/{thread:slug}', [ThreadController::class, 'update'])->name('threads.update');
Route::get('/forum/threads/{category:slug}/{thread:slug}', [ThreadController::class, 'show'])->name('threads.show');

Route::get('/forum/threads/tag/{tag:slug}', [TagController::class, 'index'])->name('threads.tags.index');

/*Route::post('/forum/threads/{thread:slug}',
    [ReplyController::class, 'store']
)->name('replies.store')->middleware('auth');*/

//Route::get('/forum/threads/{category:slug}/{thread:slug}', [ReplyController::class, 'show'])->name('threads.show');

Route::group(['prefix' => 'replies', 'as' => 'replies.'], function () {
    Route::post('/', [ReplyController::class, 'store'])->name('store');
    Route::get('/{reply}', [ReplyController::class, 'show'])->name('show');
    Route::get('reply/{id}/{type}', [ReplyController::class, 'redirect'])->name('replyAble');

});

Route::get('dashboard/users', [PageController::class, 'users'])->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'],
function() {
    Route::group(['prefix' => 'notifications', 'as' => 'notifications.'],
    function(){
        Route::get('/', [NotificationController::class, 'index'])->name('index');
    });
});
