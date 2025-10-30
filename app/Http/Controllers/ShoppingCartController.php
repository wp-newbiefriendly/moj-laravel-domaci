<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index(ProductModel $product)
    {
        $cart = Session::get('product', []);
        $totalPrice = 0;

        foreach ($cart as $product) {
            $totalPrice += $product['amount'] * $product['price'];
        }
        return view('products.cart', compact('cart', 'totalPrice'));
    }


    public function addToCart(CartAddRequest $request)
    {
        $product = ProductModel::find($request->id);
        if ($request->amount > $product->amount) {
            return redirect()->back()->with("error", "Nema dovoljno proizvoda!");
        }

        Session::push('product', [
            'product_id' => $request->id,
            'name' => $product->name,
            'amount' => $request->amount,
            'price' => $product->price,
        ]);

        return redirect('/cart');
    }
}
