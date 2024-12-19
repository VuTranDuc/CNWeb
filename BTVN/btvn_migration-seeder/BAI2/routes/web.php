<?php

use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;

Route::get("/", [LaptopController::class, "index"])->name("laptops.index");
Route::get("/create", [LaptopController::class, "create"])->name("laptops.create");
Route::post("/store", [LaptopController::class, "store"])->name("laptops.store");
Route::get("/show/{id}", [LaptopController::class, "show"])->name("laptops.show");
Route::get("/edit/{id}", [LaptopController::class, "edit"])->name("laptops.edit");
Route::put("/update/{id}", [LaptopController::class, "update"])->name("laptops.update");
