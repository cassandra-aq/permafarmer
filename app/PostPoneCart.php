<?php
/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 17/09/2019
 * Time: 12:21
 */

namespace App;


class PostPoneCart extends Model {

    protected $fillable = [
        'type',
        'used'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}