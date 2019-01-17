<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;

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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm($type) {
        if ($type == 'restaurateur') {
            return view('auth.restaurateur.login');
        } else if ($type == 'influencer') {
            return view('auth.influencer.login');
        }
    }

    public function redirectTo()
    {
        if (Auth::user()->type == 0) {
            return '/restaurateur';
        } else if (Auth::user()->type == 1) {
            return redirect()->route('influencer::search');
        }
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
            
    //         if (Auth::user()->type == 0) {
    //             return redirect()->intended('restaurateur');
    //         } else if (Auth::user()->type == 1) {
    //             return redirect()->intended('influencer');
    //         }
    //         // return redirect()->intended('dashboard');
    //     }
    // }
}
