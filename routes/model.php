<?php

use App\Http\Controllers\AdProductController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('cities', [CityController::class,'index']);

    Route::get('adproducts', [AdProductController::class,'index']);
});
