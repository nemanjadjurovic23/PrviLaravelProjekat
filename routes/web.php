<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [\App\Http\Controllers\HomepageController::class, 'index']);

Route::view("/about", "about");

Route::get("/shop", [\App\Http\Controllers\ShopController::class, 'index']);

// kada se dodje na http://127.0.0.1:8000/contact -> ucitaj ContactController -> Iz tog controllera pozovi funkciju index
Route::get("/contact", [\App\Http\Controllers\ContactController::class, 'index']);
Route::get("/admin/allContacts", [\App\Http\Controllers\ContactController::class, 'getAllContacts']);
Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, "sendContact"]);

Route::get("/admin/add-product", [\App\Http\Controllers\ProductController::class, "addProductForm"]);
Route::post("/admin/add-products", [\App\Http\Controllers\ProductController::class, "addProduct"]);

Route::get("/admin/products", [\App\Http\Controllers\ProductController::class, "allProducts"]);
