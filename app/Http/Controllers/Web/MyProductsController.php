<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;

class MyProductsController extends Controller
{
    public function showMyProducts()
    {
        $user = User::findOrFail(1);
        $cart = $user->carts()->where('created_at', date('d-m-Y'));

        return view('my_products', compact('cart', 'user'));
    }
}