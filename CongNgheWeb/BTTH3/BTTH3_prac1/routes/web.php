<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleController;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get("medicines", [MedicineController::class, "index"])->name('medicines');
Route::get("sales", [SaleController::class, "index"])->name('sales');
