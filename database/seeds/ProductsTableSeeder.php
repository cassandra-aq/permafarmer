<?php

use App\Product;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 18/09/2019
 * Time: 15:22
 */

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => "tomates",
            'price' => 3.20,
            'weight_stocked' => 15,
            'unity_stocked' => null,
            'weight' => 0.15,
            'image_name' => 'tomate.jpg'
        ]);
        Product::create([
            'name' => "carottes",
            'price' => 4.20,
            'weight_stocked' => 10,
            'unity_stocked' => null,
            'weight' => 0.1,
            'image_name' => 'carotte.jpg'
        ]);
        Product::create([
            'name' => "courgettes",
            'price' => 2.50,
            'weight_stocked' => 15,
            'unity_stocked' => null,
            'weight' => 0.3,
            'image_name' => 'courgette.jpg'
        ]);
        Product::create([
            'name' => "aubergines",
            'price' => 4.80,
            'weight_stocked' => 5,
            'unity_stocked' => null,
            'weight' => 0.2,
            'image_name' => 'aubergine.jpg'
        ]);
        Product::create([
            'name' => "pommes de terre",
            'price' => 2.10,
            'weight_stocked' => 50,
            'unity_stocked' => null,
            'weight' => 0.15,
            'image_name' => 'pdt.jpg'
        ]);
    }
}