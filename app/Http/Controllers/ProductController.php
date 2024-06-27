<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
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
    public function addProduct(AddProductRequest $request)
    {
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
        $singleProduct = $this->productRepo->getProductById($product);
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
        $this->productRepo->updateProduct($request, $product);
        return redirect()->route("sviProizvodi")->with("success", "Proizvod uspesno azuriran.");
    }

}
