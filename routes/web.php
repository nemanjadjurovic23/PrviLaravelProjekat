<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/shop", function () {
    return view("shop");
});

Route::get("/about", function () {
    return view("/about");
});

Route::get("/contact", function () {
    return view("contact");
});
