<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Reservation;
use App\Discount;
use Auth;

class InfluencerController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('influencer');
    }*/

    public function search()
    {
        $restaurants = Restaurant::all();
        return view('influencer.search', compact('restaurants'));
    }

    public function select($id)
    {
        $restaurant = Restaurant::find($id);

        return view('influencer.select', ['restaurant' => $restaurant]);
    }


    public function createReservation(Request $request)
    {
        $influencer = Auth::user()->influencer;
        $discount = Discount::find($request->discount);

        $date = new \DateTime($request->date . $request->time);

        $reservation = new Reservation;
        $reservation->restaurant_id = $request->restaurant_id;
        $reservation->influencer_id = $influencer->id;
        $reservation->discount = $discount->discount;
        $reservation->stories = $discount->stories;
        $reservation->posts = $discount->posts;
        $reservation->client_count = $request->number;
        $reservation->dateTime = $date;
        $reservation->status = "Pending";
        $reservation->save();

        return route('influencer::dashboard');
    }

    public function reservationList()
    {
        $reservations = Auth::user()->influencer->reservations;

        return view('influencer.reservation.list', ['reservations' => $reservations]);
    }

    public function reservationSingle($id)
    {
        $reservation = Reservation::find($id);

        return view('influencer.reservation.show', ['reservation' => $reservation]);
    }
}
