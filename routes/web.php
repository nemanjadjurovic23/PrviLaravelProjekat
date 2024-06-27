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

    Route::controller(ContactController::class)->prefix('/contact')->group(function () {
        Route::get("/all", 'getAllContacts')->name("allContacts");
        Route::get("/delete/{contact}", 'deleteContact')->name("deleteContact");
        Route::get("/edit/{contact}", 'editContact')->name("editContact");
        Route::put("/update/{contact}", 'updateContact')->name("updateContact");
        Route::post("/send", 'sendContact')->name("sendContact");
    });

    Route::controller(ProductController::class)->prefix('/product')->group(function () {
        Route::get("/add", 'addProduct')->name("addProduct");
        Route::post('/save', 'saveProduct')->name('saveProduct');
        Route::get('/all', 'allProducts')->name('allProducts');
        Route::get('/delete/{product}', 'deleteProduct')->name('deleteProduct');
        Route::get('/edit/{product}', 'editProduct')->name('editProduct');
        Route::put('/update/{product}', 'updateProduct')->name('updateProduct');
    });

});

require __DIR__.'/auth.php';
