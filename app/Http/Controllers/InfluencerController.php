<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;

class InfluencerController extends Controller
{
    public function __construct()
    {
        $this->middleware('influencer');
    }

    public function search()
    {
        $restaurants = Restaurant::all();
        return view('influencer.search', compact('restaurants'));
    }

//    public function index()
//    {
//    	return view('influencer.index');
//    }
}
