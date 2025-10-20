<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
	{	
    $sat = date("H");
	
    $trenutnoVreme = date("H:i:s");
    return view('welcome', ['trenutnoVreme' => $trenutnoVreme], ['sat' => $sat]);
    }
}


