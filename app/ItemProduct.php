<?php
/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 17/09/2019
 * Time: 12:17
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class ItemProduct extends Model {

    protected $fillable = [
        'quantity'
    ];

    public function carts()
    {
        return $this->belongsTo('App\Cart');
    }

    public function products()
    {
        return $this->hasOne('App\Product');
    }

}