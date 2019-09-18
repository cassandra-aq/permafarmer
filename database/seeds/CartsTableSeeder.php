<?php

use App\Cart;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 18/09/2019
 * Time: 15:17
 */

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'state' => "reçue",
            'user_id' => 1
        ]);
        Cart::create([
            'state' => "traitée",
            'user_id' => 1
        ]);
        Cart::create([
            'state' => "en cours de préparation",
            'user_id' => 2
        ]);
        Cart::create([
            'state' => "reçue",
            'user_id' => 2
        ]);
        Cart::create([
            'state' => "reçue",
            'user_id' => 3
        ]);
        Cart::create([
            'state' => "reportée",
            'user_id' => 3
        ]);
    }
}