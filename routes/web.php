<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{cat}', [ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('showProduct');
Route::get('/cart', [CartController::class, 'index'])->name('cartIndex')->middleware('auth');
Route::get('/contact', function() {
    return view('contact.index');
})->name('contact')->middleware('auth');
Route::get('/login', function() {
    return view('login');
})->name('login')->middleware('guest');
Route::get('/register', function() {
    return view('register');
})->name('register')->middleware('guest');
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
}); 

Route::post('/', [PostController::class, 'email'])->name('email');
Route::post('/contact', [PostController::class, 'contact'])->name('contact');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/login', [PostController::class, 'postLogin']);
Route::post('/register', [PostController::class, 'postRegister']);