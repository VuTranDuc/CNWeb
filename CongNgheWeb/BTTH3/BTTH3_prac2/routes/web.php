<?php

use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StudentController;

// Cập nhật route trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Cập nhật route cho danh sách thuốc
Route::get('classes', [ClassController::class, 'index'])->name('classes');

// Cập nhật route cho danh sách bán hàng
Route::get('students', [StudentController::class, 'index'])->name('students');
