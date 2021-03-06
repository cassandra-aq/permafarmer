<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'duration', 'weight', 'end_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
