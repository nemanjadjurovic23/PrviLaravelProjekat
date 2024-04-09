<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ShopController extends Controller
{
    public function index()
    {
//        $products = [
//            "iPhone 14",
//            "Samsung A52s",
//            "Samsung A30",
//            "iPhone 13 pro"
//        ];

        $products = Products::all();

        return view("shop", compact('products'));
    }
}
