<?php

namespace App\Http\Controllers\Web;

use App\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::paginate(20);
        return view('home', ['products' => $products]);
    }

}