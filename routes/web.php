<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));
Route::get('/index.html', fn() => redirect('/'));
Route::get('/products.html', fn() => view('products'));
Route::get('/product.html', fn() => view('product'));
Route::get('/markets.html', fn() => view('markets'));
Route::get('/trending.html', fn() => view('trending'));
Route::get('/submit.html', fn() => view('submit'));
Route::get('/auth.html', fn() => view('auth'));
Route::get('/admin.html', fn() => view('admin'));
Route::get('/profile.html', fn() => view('profile'));
Route::get('/shopping.html', fn() => view('shopping'));
Route::get('/prediction.html', fn() => view('prediction'));

Route::fallback(fn() => view('index'));
