<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'state',
        'name'
    ];

    public function itemProduct()
    {
        return $this->hasMany('App\ItemProduct');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}