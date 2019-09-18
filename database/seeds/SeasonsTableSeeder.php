<?php

use App\Season;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 18/09/2019
 * Time: 15:29
 */

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            'name' => "hiver"
        ]);
        DB::table('seasons')->insert([
            'name' => "printemps"
        ]);
        DB::table('seasons')->insert([
            'name' => "été"
        ]);
        DB::table('seasons')->insert([
            'name' => "automne"
        ]);
    }
}
