<?php


use App\Http\Controllers\API\ThreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;


Route::group(['prefix' => 'user'], function () {
    Route::post('/register', AuthController::class . '@register');
    Route::post('/login', AuthController::class . '@login');
    Route::get('/show', AuthController::class . '@show');
    Route::post('/logout', AuthController::class . '@logout')->middleware('auth:api');
});


Route::group(['prefix' => 'threads', 'middleware' => 'auth:api'], function () {
    Route::post('/store', [ThreadController::class, 'store']);
    Route::apiResource('/', ThreadController::class);
    Route::put('/{thread}', [ThreadController::class, 'update'])->middleware('can:update,thread');
    Route::delete('/{thread}', [ThreadController::class, 'destroy'])->middleware('can:delete,thread');
});


