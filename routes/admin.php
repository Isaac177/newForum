<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Categories
    Route::resource('categories', CategoryController::class);
    //Route to create
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    //Route to store
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    //Route to edit
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    //Route to update

    //Route to delete
    Route::delete('categories/{category}', [CategoryController::class, 'delete'])->name('categories.delete');

});
