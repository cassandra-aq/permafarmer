<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'lastname' => "DURAND",
            'firstname' => "Pierre",
            'email' => "pierre.durand@fake.com",
            'barcode' => randomBarcode(8),
            'iban' => randomBarcode(10),
            'bic' => randomBarcode(4),
            'user_type_id' => rand(1,2),
            'password' => bcrypt('password')
        ]);
        User::create([
            'lastname' => "DOE",
            'firstname' => "John",
            'email' => "john.doe@fake.com",
            'barcode' => randomBarcode(8),
            'iban' => randomBarcode(10),
            'bic' => randomBarcode(4),
            'user_type_id' => rand(1,2),
            'password' => bcrypt('password')
        ]);
        User::create([
            'lastname' => "MANBU",
            'firstname' => "Gérard",
            'email' => "gérard.manbu@fake.com",
            'barcode' => randomBarcode(8),
            'iban' => randomBarcode(10),
            'bic' => randomBarcode(4),
            'user_type_id' => rand(1,2),
            'password' => bcrypt('password')
        ]);
        User::create([
            'lastname' => "Big",
            'firstname' => "Boss",
            'email' => "big.boss@fake.com",
            'barcode' => randomBarcode(8),
            'iban' => randomBarcode(10),
            'bic' => randomBarcode(4),
            'user_type_id' => 3,
            'password' => bcrypt('password')
        ]);
    }
}
