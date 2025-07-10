<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $timestamps = true;

    public function index()
	{
    $sat = date("H");

    $trenutnoVreme = date("H:i:s");

    $products = ProductModel::all();

    // $latestProducts = ProductModel::orderBy('created_at', 'desc')->take(6)->get(); //->reverse() = za obrnuti redosled
        $latestProducts = ProductModel::latest()->take(6)->get(); // izvuci poslednjih 6 kreiranih od 7

        return view('welcome', [
            'trenutnoVreme' => $trenutnoVreme,
            'sat' => $sat,
            'latestproducts' => $latestProducts,
            'products' => $products
        ]);
    }
}
