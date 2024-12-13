<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\IssueController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('computers', ComputerController::class);
Route::resource('issues', IssueController::class);
