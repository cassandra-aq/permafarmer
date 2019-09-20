<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;

class MySubscriptionsController extends Controller
{
    public function showMySubscriptions()
    {
        $user = User::findOrFail(1);
        $totalSubscriptionPrice = 0;
        foreach ($user->subscriptions as $subscription) {
            if ($subscription->weight == 2.5) {
                $totalSubscriptionPrice += 48.40;
            } else if ($subscription->weight == 7) {
                $totalSubscriptionPrice += 111.60;
            }
        }

        return view('my_subscriptions', compact('user', 'totalSubscriptionPrice'));
    }
}