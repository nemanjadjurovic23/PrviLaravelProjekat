<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get("/", [HomepageController::class, 'index'])->name('homeRoute');
Route::view("/about", "about");
Route::get("/shop", [ShopController::class, 'index']);
Route::get("/contact", [ContactController::class, 'index']);
Route::post("/send-contact", [ContactController::class, "sendContact"]);


Route::get("/admin/all-contacts", [ContactController::class, 'getAllContacts'])->name("sviKontakti");
Route::get("/admin/delete-contact/{contact}", [ContactController::class, "deleteContact"])->name("deleteContact");
Route::get("/admin/edit-contact/{contact}", [ContactController::class, "editContact"])->name("editContact");
Route::put("/admin/update-contact/{contact}", [ContactController::class, "updateContact"])->name("updateContact");

Route::get("/admin/add-product", [ProductController::class, "addProductForm"]);
Route::post("/admin/add-products", [ProductController::class, "addProduct"]);

Route::get("/admin/all-products", [ProductController::class, "allProducts"])->name("sviProizvodi");
Route::get("/admin/delete-product/{product}",[ProductController::class, "deleteProduct"])->name("deleteProduct");
Route::get("/admin/edit-product/{product}", [ProductController::class, "editProduct"])->name("editProduct");
Route::put("/admin/update-product/{product}", [ProductController::class, "updateProduct"])->name("updateProduct");
