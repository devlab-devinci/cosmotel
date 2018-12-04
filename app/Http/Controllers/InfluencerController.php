<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfluencerController extends Controller
{
	public function __construct()
    {
        $this->middleware('influencer');
    }

    public function index()
    {
    	return view('influencer.index');
    }
}