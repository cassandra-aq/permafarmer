<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTypesTableSeeder::class,
            UsersTableSeeder::class,
            CartsTableSeeder::class,
            ProductsTableSeeder::class,
            SeasonsTableSeeder::class,
            SubscriptionsTableSeeder::class,
            ItemProductsTableSeeder::class,
            ProductSeasonsTableSeeder::class,
        ]);
    }
}
