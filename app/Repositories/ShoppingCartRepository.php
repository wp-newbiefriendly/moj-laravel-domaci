<?php
namespace App\Repositories;

use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Session;

class ShoppingCartRepository
{

    public function addToCart($productId, $amount)
    {
        $product = ProductModel::find($productId);
        if ($product->amount < $amount) {
            return false;
        }

        Session::push('product', [
            'product_id' => $product->id,
            'name' => $product->name,
            'amount' => $amount,
            'price' => $product->price,
        ]);

        return true;
    }


    public function getCartItems()
    {
        $cart = Session::get('product', []);
        $combined = [];
        $totalPrice = 0;

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
                $totalPrice += $total;
            }
        }

        return compact('combined', 'totalPrice');
    }

    public function finishOrder($cart)
    {
        if (empty($cart)) {
            return null;
        }

        $totalPrice = 0;


        $order = Orders::create([
            'user_id' => auth()->user()->id,
            'total_price' => 0,
        ]);

        $orderItems = [];

        foreach ($cart as $item) {
            $product = ProductModel::find($item['product_id']);
            if ($item['amount'] > $product->amount) {
                return null;
            }

            $totalPrice += $item['amount'] * $product->price;


            $product->amount -= $item['amount'];
            $product->save();


            $orderItems[] = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'amount' => $item['amount'],
                'price' => $item['price'] * $item['amount'],
            ]);
        }


        $order->update(['total_price' => $totalPrice]);

        return compact('order', 'orderItems', 'totalPrice');
    }




    public function removeProductFromCart($productId)
    {
        $cart = Session::get('product', []);
        $cart = array_filter($cart, function($item) use ($productId) {
            return $item['product_id'] != $productId;
        });

        Session::put('product', $cart);
    }
}
