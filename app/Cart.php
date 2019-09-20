<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'state',
        'name'
    ];

    public function products()
    {
        return $this
            ->belongsToMany('App\Product','item_products','cart_id', 'product_id')
            ->withPivot('quantity');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}