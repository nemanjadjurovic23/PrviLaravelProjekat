<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;

class HomepageController extends Controller
{
    public function index()
    {
        $products = ProductsModel::all();

        $latestAdded = ProductsModel::orderByDesc("id")->take(6)->get();

        $url = route('homeRoute');

        return view("welcome", compact( 'products', 'latestAdded'));
    }
}
