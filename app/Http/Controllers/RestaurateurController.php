<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class RestaurateurController extends Controller
{
	/*public function __construct()
    {
        $this->middleware('restaurateur');
    }*/

    public function index()
    {
    	return view('restaurateur.index');
    }

    public function dashboard()
    {
        $restaurateur = Auth::user()->restaurateur;
        $restaurants = $restaurateur->restaurants;

        $reservations = [];

        foreach ($restaurants as $restaurant) {
            $reservations[] = $restaurant->reservations;
        }

        return view('restaurateur.dashboard', ['restaurants' => $restaurants, 'reservations' => $reservations]);
    }
}
