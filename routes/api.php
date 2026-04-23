<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TrendingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\SmartShoppingController;
use App\Http\Controllers\ScraperController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// ─── Products ────────────────────────────────────────────────────────
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// ─── Markets ─────────────────────────────────────────────────────────
Route::get('/markets', [MarketController::class, 'index']);
Route::get('/markets/{id}', [MarketController::class, 'show']);
Route::post('/markets', [MarketController::class, 'store']);
Route::put('/markets/{id}', [MarketController::class, 'update']);
Route::delete('/markets/{id}', [MarketController::class, 'destroy']);

// ─── Prices ──────────────────────────────────────────────────────────
Route::get('/prices', [PriceController::class, 'index']);
Route::post('/prices', [PriceController::class, 'store']);
Route::put('/prices/{id}', [PriceController::class, 'update']);
Route::delete('/prices/{id}', [PriceController::class, 'destroy']);

// ─── Trending ────────────────────────────────────────────────────────
Route::get('/trending', [TrendingController::class, 'index']);

// ─── Stats ───────────────────────────────────────────────────────────
Route::get('/stats', [StatsController::class, 'index']);
Route::get('/contributors', [StatsController::class, 'contributors']);

// ─── Auth ────────────────────────────────────────────────────────────
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/me', [AuthController::class, 'me']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/register', [AuthController::class, 'register']);

// ─── Profile ─────────────────────────────────────────────────────────
Route::get('/users/profile', [ProfileController::class, 'show']);

// ─── Predictions (AI) ───────────────────────────────────────────────
Route::get('/predictions/{productId}', [PredictionController::class, 'show']);

// ─── Smart Shopping ─────────────────────────────────────────────────
Route::post('/smart-shopping', [SmartShoppingController::class, 'calculate']);
Route::get('/districts', [SmartShoppingController::class, 'districts']);

// ─── Admin (protected) ──────────────────────────────────────────────
Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/admin/pending-prices', [AdminController::class, 'pendingPrices']);
    Route::post('/admin/verify-price/{id}', [AdminController::class, 'verifyPrice']);
    Route::get('/admin/stats', [AdminController::class, 'stats']);
    Route::post('/admin/refresh-prices', [ScraperController::class, 'refreshPrices']);
});
