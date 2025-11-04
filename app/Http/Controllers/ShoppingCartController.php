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
        $combined = [];
        $totalPrice = 0;

        foreach (Session::get('product') as $item) {
            $product = ProductModel::firstWhere(['id' => $item['product_id']]);
            if ($product) {
                $total = $item['amount'] * $product->price;
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'total' => $total
                ];
                $totalPrice += $total;  // Dodajemo ukupnu cenu proizvoda
            }
        }
        return view('products.cart', compact('totalPrice', 'product', 'combined'));
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
