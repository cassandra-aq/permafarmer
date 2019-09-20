<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;

class MyProductsController extends Controller
{
    public function showMyProducts()
    {
        $user = User::findOrFail(1);
        $cart = $user->carts()->first();
        $total_weight = 0;
        foreach ($cart->products as $product) {
            $total_weight += $product->quantity($user) * 0.5;
        }

        return view('my_products', compact('cart', 'user', 'total_weight'));
    }
}