<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class InstagramController extends Controller
{
    public function redirectToInstagramProvider()
    {
        return Socialite::with('instagram')->scopes([
            "public_content"])->redirect();
    }

    public function handleProviderInstagramCallback()
    {
        $insta = Socialite::driver('instagram')->user();
        $details = [
            "access_token" => $insta->token
        ];

        if(Auth::user()->influencer){
            Auth::user()->influencer()->update($details);
        }else{
            Auth::user()->influencer()->create($details);
        }
        return redirect('/');
    }
}
