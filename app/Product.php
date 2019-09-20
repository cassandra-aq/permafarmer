<?php
/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 17/09/2019
 * Time: 12:23
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model {

    protected $fillable = [
        'name',
        'price',
        'weight_stocked',
        'unity_stocked',
        'weight',
        'image_name'
    ];

    public function carts()
    {
        return $this
            ->belongsToMany('App\Cart','item_products','product_id', 'cart_id')
            ->withPivot('quantity');
    }

    public function quantity($user) {
        $userCart = $user->carts()->firstOrFail();
        if (!$userCart)
            return 0;

        $userCart->save();
        $products = $userCart->products()->where('products.id', $this->id);
        $productQuantity = 0;
        if ($products->count() > 0)
            $productQuantity = $products->firstOrFail()->pivot->quantity;

        return $productQuantity;
    }

    public function seasons()
    {
        return $this->belongsToMany('App\Season');
    }
}