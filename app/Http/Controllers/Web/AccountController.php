<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;

class AccountController extends Controller
{
    public function showMyAccount()
    {
        $user = User::findOrFail(1);

        return view('my_account', compact('user'));
    }
}