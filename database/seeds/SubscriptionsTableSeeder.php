<?php

use App\Subscription;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: étudiant
 * Date: 18/09/2019
 * Time: 15:34
 */

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscription::create([
            'duration' => 6,
            'end_at' => "2019-10-01 14:00:00",
            'weight' => 2.5,
            'user_id' => 1
        ]);
        Subscription::create([
            'duration' => 6,
            'end_at' => "2020-03-01 14:00:00",
            'weight' => 2.5,
            'user_id' => 2
        ]);
        Subscription::create([
            'duration' => 12,
            'end_at' => "2020-10-01 14:00:00",
            'weight' => 7,
            'user_id' => 3
        ]);
    }
}