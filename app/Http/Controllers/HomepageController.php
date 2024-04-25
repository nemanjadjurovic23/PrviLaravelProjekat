<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
