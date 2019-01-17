<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Facades\Instagram;

class InfluencerController extends Controller
{
    public function __construct()
    {
        $this->middleware('influencer');
    }

    public function search()
    {
        /*$restaurants = Restaurant::all();
        return view('influencer.search', compact('restaurants'));*/
        return view('influencer.search')
            ->with('restaurants', Restaurant::all())
            ->with('user', Instagram::getUser())
            ->with('posts', Instagram::getPosts());
    }

//    public function index()
//    {
//    	return view('influencer.index');
//    }
}
