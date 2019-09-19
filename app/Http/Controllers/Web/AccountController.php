<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $connectedUser;

    public function __construct()
    {
        $this->connectedUser = Auth::user();
    }

    public function showMyAccount()
    {
        return view('my_account', compact('connectedUser'));
    }
}