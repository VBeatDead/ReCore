<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\newsController;

// Route::get('/', [HomeController::class, 'index']);
route::get('/', [newsController::class, 'show']);
