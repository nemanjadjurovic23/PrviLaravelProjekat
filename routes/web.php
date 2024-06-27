<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
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
Route::view("/about", "about")->name('about');
Route::get("/shop", [ShopController::class, 'index'])->name('shop');
Route::get("/contact", [ContactController::class, 'index'])->name('contact');

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () {

    Route::controller(ContactController::class)->group(function () {
        Route::get("contact/all", 'getAllContacts')->name("allContacts");
        Route::get("contact/delete/{contact}", 'deleteContact')->name("deleteContact");
        Route::get("contact/edit/{contact}", 'editContact')->name("editContact");
        Route::put("contact/update/{contact}", 'updateContact')->name("updateContact");
        Route::post("contact/send", 'sendContact')->name("sendContact");
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get("product/add", 'addProduct')->name("addProduct");
        Route::post('product/save', 'saveProduct')->name('saveProduct');
        Route::get('product/all', 'allProducts')->name('allProducts');
        Route::get('product/delete/{product}', 'deleteProduct')->name('deleteProduct');
        Route::get('product/edit/{product}', 'editProduct')->name('editProduct');
        Route::put('product/update/{product}', 'updateProduct')->name('updateProduct');
    });

});

require __DIR__.'/auth.php';
