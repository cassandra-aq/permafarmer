<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;

class AccountController extends Controller
{
    public function showMyAccount()
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

        return view('my_account', compact('user', 'totalSubscriptionPrice'));
    }
}