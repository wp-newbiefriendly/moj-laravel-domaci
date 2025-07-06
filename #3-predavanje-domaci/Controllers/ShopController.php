<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
	{
		$products = [
			"Youtube", "Canva Pro", "ChatGPT", "Adobe Creative Cloud", "Windows 11"
		];
    return view('shop', ['products' => $products]);
	}
}
