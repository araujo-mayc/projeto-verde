<?php

use App\Models\City;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\AdProduct;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cidades', function () {
    return Inertia::render('Profile/SelectCity');
})->name('select.city');

Route::get('/cidades/anuncios/{city:name}', function (City $city) {
    return Inertia::render('Marketplace', [
        'city' => $city
    ]);
})->name('marketplace');

Route::get('/cidades/anuncios/item/{adProduct:id}', function (AdProduct $adProduct) {
    $sellerInfo = (new UserController)->getSellerInfo($adProduct->user_id);

    return Inertia::render('ProductDetails', [
        'product' => $adProduct,
        'sellerInfo' => $sellerInfo
    ]);
})->name('marketplace');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/model.php';
