<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\ApiCategoryController;
use App\Mail\CategoryNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/category', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('category');
Route::get('/category/form/{id}', [CategoryController::class, 'edit'])->name('/category/form');
Route::get('/category/create', [CategoryController::class,'create'])->name('create');
Route::post('/category', [CategoryController::class, 'store',])->middleware(['auth', 'verified']);
Route::patch('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
