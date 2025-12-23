<?php
namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ShoppingCartRepository;
use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    protected $cartRepo;

    public function __construct(ShoppingCartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    // Prikaz korpe
    public function index()
    {
        $cartData = $this->cartRepo->getCartItems();
        return view('products.cart', $cartData);
    }

    // Dodavanje proizvoda u korpu
    public function addToCart(CartAddRequest $request)
    {
        $success = $this->cartRepo->addToCart($request->id, $request->amount);
        if (!$success) {
            return redirect()->back()->with("error", "Nema dovoljno proizvoda!");
        }
        return redirect('/cart');
    }

    // Završavanje porudžbine
    public function finishOrder()
    {
        $cart = Session::get('product', []);

        $orderData = $this->cartRepo->finishOrder($cart);

        if (!$orderData) {
            return redirect()->back()->with("error", "Nema dovoljno proizvoda ili je korpa prazna!");
        }

        Session::remove('product');

        return view('thankyou', $orderData);
    }

}
