<?php

use App\ItemProduct;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 18/09/2019
 * Time: 15:38
 */

class ItemProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_products')->insert([
            'quantity' => "4",
            'product_id' => rand(1,5),
            'cart_id' => 1
        ]);
        DB::table('item_products')->insert([
            'quantity' => "2",
            'product_id' => rand(1,5),
            'cart_id' => 1
        ]);
        DB::table('item_products')->insert([
            'quantity' => "6",
            'product_id' => rand(1,5),
            'cart_id' => 2
        ]);
        DB::table('item_products')->insert([
            'quantity' => "1",
            'product_id' => rand(1,5),
            'cart_id' => 3
        ]);
        DB::table('item_products')->insert([
            'quantity' => "8",
            'product_id' => rand(1,5),
            'cart_id' => 3
        ]);
        DB::table('item_products')->insert([
            'quantity' => "3",
            'product_id' => rand(1,5),
            'cart_id' => 3
        ]);
        DB::table('item_products')->insert([
            'quantity' => "10",
            'product_id' => rand(1,5),
            'cart_id' => 4
        ]);
        DB::table('item_products')->insert([
            'quantity' => "2",
            'product_id' => rand(1,5),
            'cart_id' => 5
        ]);
        DB::table('item_products')->insert([
            'quantity' => "8",
            'product_id' => rand(1,5),
            'cart_id' => 6
        ]);
        DB::table('item_products')->insert([
            'quantity' => "6",
            'product_id' => rand(1,5),
            'cart_id' => 6
        ]);
    }
}