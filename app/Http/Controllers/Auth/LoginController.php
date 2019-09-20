<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function open()
    {
        return view('auth.login');
    }

    public function authentificate(Request $request)
    {

        $route =
        DB::transaction(function () use ($request) {
            $users = User::all();
            $password = Hash::make($request->password);
            foreach ($users as $user) {
                if (strcmp($user->email, $request->email) == 0) {
                    //if ($user->password == $password) {
                    if ($user->user_type_id != 3) {
                        return 'home';
                    } else {
                        return 'admin';
                    }
                }
            };
            return '';
        });
        return redirect()->route($route);

    }
}
