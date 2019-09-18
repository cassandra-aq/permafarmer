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
            'firstname' => "DURAND",
            'lastname' => "Pierre",
            'email' => "pierre.durand@fake.com",
            'barcode' => randomBarcode(8),
            'iban' => randomBarcode(10),
            'bic' => randomBarcode(4),
            'user_type_id' => rand(1,2),
            'password' => bcrypt('password')
        ]);
        User::create([
            'firstname' => "DOE",
            'lastname' => "John",
            'email' => "john.doe@fake.com",
            'barcode' => randomBarcode(8),
            'iban' => randomBarcode(10),
            'bic' => randomBarcode(4),
            'user_type_id' => rand(1,2),
            'password' => bcrypt('password')
        ]);
        User::create([
            'firstname' => "MANBU",
            'lastname' => "Gérard",
            'email' => "gérard.manbu@fake.com",
            'barcode' => randomBarcode(8),
            'iban' => randomBarcode(10),
            'bic' => randomBarcode(4),
            'user_type_id' => rand(1,2),
            'password' => bcrypt('password')
        ]);
    }
}
