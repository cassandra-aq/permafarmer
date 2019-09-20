<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class StaticController extends Controller
{

    public function whoAreWe()
    {
        return view('who');
    }


    public function whatWeDo()
    {
        return view('what');
    }
}