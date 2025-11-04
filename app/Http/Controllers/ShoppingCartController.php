<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index(ProductModel $product)
    {
        $combined = [];
        $totalPrice = 0;
        $cart = Session::get('product', []);

        foreach ($cart as $item) {
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
    public function finishOrder()
    {
        $cart = Session::get('product', []);
        $totalPrice = 0;

        foreach ($cart as $item) {
            $product = ProductModel::firstWhere(['id' => $item['product_id']]);
            $totalPrice = $item['amount'] * $product->price;
            if ($item['amount'] > $product->amount)
            {
              return redirect()->back()->with("error", "Nema dovoljno proizvoda!");
            }

            $order = Orders::create([
                'user_id' => auth()->user()->id,
                'total_price' => $totalPrice,
            ]);

            foreach ($cart as $item) {
                $product = ProductModel::firstWhere(['id' => $item['product_id']]);
                $product->amount -= $item['amount'];
                $product->save();

                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'amount' => $item['amount'],
                    'price' => $item['price'] * $item['amount'],
                ]);
            }
            Session::remove('product');

            return view('thankyou');
        }
    }
}
