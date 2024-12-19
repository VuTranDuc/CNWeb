<?php

use App\Http\Controllers\HardwareDevicesController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HardwareDevicesController::class, "index"]);
