<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function addProduct(Request $request)
    {
        $request->validate([
            "name" => "required|string|unique:products",
            "description" => "required|string",
            "amount" => "required|integer|min:0",
            "price" => "required|min:0",
            "image" => "required|string"
        ]);

        $this->productRepo->createNew($request);

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

        if ($singleProduct == null) {
            die("Product does not exist");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function editProduct(ProductsModel $product)
    {
        return view("edit-product", compact('product'));
    }

    public function updateProduct(Request $request, ProductsModel $product)
    {
        $product->update([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);

        return redirect()->route("sviProizvodi")->with("success", "Proizvod uspesno azuriran.");
    }

}
