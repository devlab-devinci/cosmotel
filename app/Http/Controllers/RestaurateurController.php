<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class RestaurateurController extends Controller
{
	/*public function __construct()
    {
        $this->middleware('restaurateur');
    }*/

    public function index()
    {
    	$restaurants = Auth::user()->restaurateur->restaurants;
    	return view('restaurateur.index', compact('restaurants'));
    }

}
