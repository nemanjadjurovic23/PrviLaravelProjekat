<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $request->validate([
            "name" => "required|string|unique:products",
            "description" => "required|string",
            "amount" => "required|integer|min:0",
            "price" => "required|min:0",
            "image" => "required|string"
        ]);

        ProductsModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);

        return redirect()->route("sviProizvodi");
    }

    public function addProductForm()
    {
        return view("add-products");
    }

    public function allProducts()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function deleteProduct($product)
    {
        $singleProduct = ProductsModel::where(['id' => $product])->first();

        if ($singleProduct === null) {
            die("OVAJ PROIZVOD NE POSTOJI");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function editProduct($product)
    {
        $singleProduct = ProductsModel::where(['id' => $product])->first();

        if($singleProduct === null) {
            die("OVAJ PROIZVOD NE POSTOJI");
        }

        return view("edit-product", compact('singleProduct'));
    }

    public function updateProduct(Request $request, $product)
    {
        $request->validate([
            'name'=> 'string|required',
            'description'=> 'string|required',
            'amount'=> 'integer|min:0',
            'price'=> 'integer|min:0',
            'image'=> 'string'
        ]);

        $productToUpdate = ProductsModel::findOrFail($product);
        $productToUpdate->update([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);

        return redirect()->route("sviProizvodi")->with("success", "Proizvod uspesno azuriran.");
    }

}
