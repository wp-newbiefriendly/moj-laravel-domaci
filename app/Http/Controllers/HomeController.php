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

    $latestProducts = ProductModel::orderBydesc('id')
        ->take(6)
        ->get();
    //    $latestProducts = ProductModel::latest()->take(6)->get(); // izvuci poslednjih 6 kreiranih od 7

        return view('welcome', [
            'trenutnoVreme' => $trenutnoVreme,
            'sat' => $sat,
            'latestProducts' => $latestProducts,
            'products' => $products
        ]);
    }
}


