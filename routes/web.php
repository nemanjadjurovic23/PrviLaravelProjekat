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


Route::get("/", [HomepageController::class, 'index'])->name('homeRoute');
Route::view("/about", "about");
Route::get("/shop", [ShopController::class, 'index']);
Route::get("/contact", [ContactController::class, 'index']);

Route::middleware('auth')->prefix("admin")->group(function () {

    Route::get("/all-contacts", [ContactController::class, 'getAllContacts'])->name("sviKontakti");
    Route::get("/delete-contact/{contact}", [ContactController::class, "deleteContact"])->name("deleteContact");
    Route::get("/edit-contact/{contact}", [ContactController::class, "editContact"])->name("editContact");
    Route::put("/update-contact/{contact}", [ContactController::class, "updateContact"])->name("updateContact");
    Route::post("/send-contact", [ContactController::class, "sendContact"]);

    Route::get("/add-product", [ProductController::class, "addProductForm"]);
    Route::post("/add-products", [ProductController::class, "addProduct"]);

    Route::get("/all-products", [ProductController::class, "allProducts"])->name("sviProizvodi");
    Route::get("/delete-product/{product}",[ProductController::class, "deleteProduct"])->name("deleteProduct");
    Route::get("/edit-product/{product}", [ProductController::class, "editProduct"])->name("editProduct");
    Route::put("/update-product/{product}", [ProductController::class, "updateProduct"])->name("updateProduct");

});

require __DIR__.'/auth.php';
