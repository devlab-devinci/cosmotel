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
            foreach ($restaurant->reservations as $reservation) {
                $reservations[] = $reservation;
            }
        }

        return view('restaurateur.dashboard', ['restaurants' => $restaurants, 'reservations' => $reservations]);
    }
}
