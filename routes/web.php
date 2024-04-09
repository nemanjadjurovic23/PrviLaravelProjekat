<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [\App\Http\Controllers\HomepageController::class, 'index']);

Route::view("/about", "about");

Route::get("/shop", [\App\Http\Controllers\ShopController::class, 'index']);

// kada se dodje na http://127.0.0.1:8000/contact -> ucitaj ContactController -> Iz tog controllera pozovi funkciju index
Route::get("/contact", [\App\Http\Controllers\ContactController::class, 'index']);

