<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use Instagram\Storage\CacheManager;
use Instagram\Api;

class InfluencerController extends Controller
{
    public function __construct()
    {
        $this->middleware('influencer');
    }

    public function search()
    {
        /*$cache = new CacheManager(__DIR__ . '/../../../storage/framework/cache/data/instagram/');
        $api   = new Api($cache);
        $api->setUserName('aurelienmasson');

        $feed = $api->getFeed();

        dd($feed);*/

        $restaurants = Restaurant::all();
        return view('influencer.search', compact('restaurants'));
    }
}
