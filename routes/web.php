<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashbord', [DashboardController::class, 'index'])->name('dashbord');


// dashboard Routes
Route::get('/', function () {
    if (session('user')) {
        return redirect()->route('dashbord');
    } else {
        return redirect()->route('loginview')->with('error', 'You must log in first');
    }
})->name('/');

// auth Routes
Route::get('/loginview', [AuthController::class, 'loginview'])->name('loginview');
Route::get('/ragisterview', [AuthController::class, 'ragisterview'])->name('ragisterview');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// product routes
Route::get('add_edit_product/{id?}', [ProductController::class, 'add_product'])->name('add_edit_product');
Route::post('product_store', [ProductController::class, 'product_store'])->name('product_store');
Route::get('delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');