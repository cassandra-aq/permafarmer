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


    public function seasons()
    {
        return $this->belongsToMany('App\Season');
    }

}