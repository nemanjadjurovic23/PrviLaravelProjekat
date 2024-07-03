<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ShoppingCartController extends Controller
{
    public function index()
    {
        $cart = Session::get('product', []);

        $combined = [];
        foreach ($cart as $item) {
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            if ($product) {
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'total' => $item['amount'] * $product->price,
                ];
            }
        }

        return view('cart', [
            'combined' => $combined,
        ]);
    }

    public function addToCart(CartAddRequest $request)
    {
        $product = ProductsModel::where(['id' => $request->id])->first();

        if ($product->amount < $request->amount) {
            return redirect()->back()->with('error', 'Not enough stock.');
        }

        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('cart.index');
    }

    public function finishOrder()
    {
        $cart = Session::get('product', []);

        $totalCartPrice = 0;

        foreach ($cart as $item) {
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            $totalCartPrice += $item['amount'] * $product->price;

            if ($item['amount'] > $product->amount) {
                return redirect()->back()->with('error', 'Not enough stock for product: ' . $product->name);
            }
        }

        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice
        ]);

        foreach ($cart as $item) {
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            $product->amount -= $item['amount'];
            $product->save();

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price,
            ]);
        }

        Session::remove('product');

        return view('thankYou');
    }
}
