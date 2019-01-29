<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Restaurateur;
use App\Influencer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Instagram\Storage\CacheManager;
use Instagram\Api;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        if (Auth::user()->type == 0) {
            return '/restaurateur';
        } else if (Auth::user()->type == 1) {
            return route('influencer::search');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'username' => ['string', $data['type'] == 1 ? 'required' : '',]
        ]);
    }

    public function showRegisterForm($type) {
        if ($type == 'restaurateur') {
            return view('auth.restaurateur.register');
        } else if ($type == 'influencer') {
            return view('auth.influencer.register');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $type = $data['type'];

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'type' => $type,
            'password' => Hash::make($data['password']),
        ]);

        if ($type == 0) {
            Restaurateur::create([
                'user_id' => $user->id
            ]);
        } else if ($type == 1) {
            $cache = new CacheManager(__DIR__ . '/../../../../storage/framework/cache/data/instagram/');
            $api   = new Api($cache);
            $api->setUserName($data['username']);

            $feed = $api->getFeed();

            Influencer::create([
                'user_id' => $user->id,
                'username' => $data['username'],
                'followers' => $feed->followers,
                'media_count' => $feed->mediaCount
            ]);
        }

        return $user;
    }
}
