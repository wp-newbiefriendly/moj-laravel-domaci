<?php

use Illuminate\Support\Facades\Route;

Route::view(uri:"/", view:"welcome");

Route::get('/about', function() {
	  return view('about');
 });
Route::get('/shop', function() {
	  return view('shop');
 });
Route::get('/kontakt', function() {
	  return view('kontakt');
 });

