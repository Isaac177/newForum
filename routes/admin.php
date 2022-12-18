<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('categories', CategoryController::class);
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::delete('categories/{category}', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::resource('tags', TagController::class);
    Route::get('tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('tags', [TagController::class, 'store'])->name('tags.store');
    Route::get('tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::delete('tags/{tag}', [TagController::class, 'delete'])->name('tags.delete');
});
