<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Cart;


class CartApiController
{

    public function addToCart($product)
    {
        $product_nb = DB::transaction(function () use ($product) {
            $user = User::findOrFail(1); // TODO : remplacer par le user connecté

            $userCart = $user->carts()->first();
            if (!$userCart) {
                $userCart = new Cart(['state' => 'en cours de préparation']);
                $userCart->user()->associate($user);
            }

            $userCart->save();

            $products = $userCart->products()->where('products.id', $product->id);
            if ($products->count() > 0) {
                $productQuantity = $products->firstOrFail()->pivot->quantity;
                $productQuantity += 1;
                $userCart->products()->updateExistingPivot($product, ['quantity' => $productQuantity]);
            } else {
                $userCart->products()->attach($product, ['quantity' => 1]);
                $productQuantity = 1;
            }

            return $productQuantity;
        });

        return json_encode($product_nb);
    }

    public function removeFromCart($product)
    {
        $product_nb = DB::transaction(function () use ($product) {
            $user = User::findOrFail(1); // TODO : remplacer par le user connecté

            $userCart = $user->carts()->first();
            if (!$userCart) {
                $userCart = new Cart(['state' => 'en cours de préparation']);
                $userCart->user()->associate($user);
            }

            $userCart->save();

            $productQuantity = 0;
            $products = $userCart->products()->where('products.id', $product->id);
            if ($products->count() > 0) {
                $productQuantity = $products->firstOrFail()->pivot->quantity;
                if ($productQuantity > 1) {
                    $productQuantity -= 1;
                    $userCart->products()->updateExistingPivot($product, ['quantity' => $productQuantity]);
                } else if ($productQuantity == 1) {
                    $userCart->products()->detach($product);
                    $productQuantity = 0;
                }
            }

            return $productQuantity;

        });

        return json_encode($product_nb);
    }
}