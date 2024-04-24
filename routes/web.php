<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomepageController::class, 'index'])->name('homeRoute');
Route::view("/about", "about");
Route::get("/shop", [ShopController::class, 'index']);
Route::get("/contact", [ContactController::class, 'index']);
Route::post("/send-contact", [ContactController::class, "sendContact"]);


Route::get("/admin/all-contacts", [ContactController::class, 'getAllContacts']);
Route::get("/admin/delete-contact/{contact}", [ContactController::class, "deleteContact"])->name("deleteContact");

Route::get("/admin/add-product", [ProductController::class, "addProductForm"]);
Route::post("/admin/add-products", [ProductController::class, "addProduct"]);

Route::get("/admin/all-products", [ProductController::class, "allProducts"])->name("sviProizvodi");

Route::get("/admin/delete-product/{product}",[ProductController::class, "deleteProduct"])->name("deleteProduct");
Route::get("/admin/products", [ProductController::class, "allProducts"]);
