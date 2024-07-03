<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/cart/add', [ShoppingCartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
    Route::get('/cart/finish', [ShoppingCartController::class, 'finishOrder'])->name('cart.finish');
});


Route::get("/", [HomepageController::class, 'index'])->name('homeRoute');
Route::view("/about", "about")->name('about');
Route::get("/shop", [ShopController::class, 'index'])->name('shop');
Route::get("/contact", [ContactController::class, 'index'])->name('contact');
Route::get('/product/{product}', [ProductController::class, 'permalink'])->name('product.permalink');


Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () {

    Route::controller(ContactController::class)->prefix('/contact')->name('contact.')->group(function () {
        Route::get("/all", 'getAllContacts')->name("all");
        Route::get("/delete/{contact}", 'deleteContact')->name("delete");
        Route::get("/edit/{contact}", 'editContact')->name("edit");
        Route::put("/update/{contact}", 'updateContact')->name("update");
        Route::post("/send", 'sendContact')->name("send");
    });

    Route::controller(ProductController::class)->prefix('/product')->name('product.')->group(function () {
        Route::get("/add", 'addProduct')->name("add");
        Route::post('/save', 'saveProduct')->name('save');
        Route::get('/all', 'allProducts')->name('all');
        Route::get('/delete/{product}', 'deleteProduct')->name('delete');
        Route::get('/edit/{product}', 'editProduct')->name('edit');
        Route::put('/update/{product}', 'updateProduct')->name('update');
    });

});

require __DIR__.'/auth.php';
