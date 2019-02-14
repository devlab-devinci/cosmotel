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
    public function search(Request $request)
    {
        // TODO: Apply more query parameters

        $restaurants = Restaurant::where('status', '=', 'public')->simplePaginate(10);

        if ($request->ajax()) {
            $view = view('influencer.restaurant.list',compact('restaurants'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('influencer.search', compact('restaurants'));
    }


    public function showRestaurant($id)
    {
        $restaurant = Restaurant::find($id);

        return view('influencer.restaurant.show', ['restaurant' => $restaurant]);
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
        $reservation->status = "pending";
        $reservation->save();

        return view('influencer.reservation.list', ['reservations' => $influencer->reservations]);
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

    public function reservationUpdate(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = $request->status;
        $reservation->update();

        return view('influencer.reservation.show', ['reservation' => $reservation]);
    }
}
