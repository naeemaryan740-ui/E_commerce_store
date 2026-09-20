<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


// مسیرهای کامل CRUD برای دسته‌بندی‌ها و محصولات

Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
