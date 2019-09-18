<?php

use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 18/09/2019
 * Time: 15:46
 */

class ProductSeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_season')->insert([
            'product_id' => 1,
            'season_id' => 3
        ]);
        DB::table('product_season')->insert([
            'product_id' => 2,
            'season_id' => 4
        ]);
        DB::table('product_season')->insert([
            'product_id' => 2,
            'season_id' => 1
        ]);
        DB::table('product_season')->insert([
            'product_id' => 3,
            'season_id' => 1
        ]);
        DB::table('product_season')->insert([
            'product_id' => 4,
            'season_id' => 2
        ]);
        DB::table('product_season')->insert([
            'product_id' => 5,
            'season_id' => 3
        ]);
        DB::table('product_season')->insert([
            'product_id' => 5,
            'season_id' => 2
        ]);
    }
}