<?php
/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 17/09/2019
 * Time: 12:23
 */

namespace App;


class Product extends Model {

    protected $fillable = [
        'name',
        'price',
        'weight_stocked',
        'unity_stocked',
        'weight'
    ];

    public function itemProduct()
    {
        return $this->belongsTo('App\ItemProduct');
    }

    public function seasons()
    {
        return $this->belongsToMany('App/Season');
    }
}