<?php

use App\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'name' => "particulier"
        ]);
        DB::table('user_types')->insert([
            'name' => "restaurateur"
        ]);
    }
}