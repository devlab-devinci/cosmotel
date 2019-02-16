<?php

namespace App\Http\Controllers;

use App\Kitchen;
use App\Service;
use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Reservation;
use App\Discount;
use Auth;
use Illuminate\Support\Facades\Log;

class InfluencerController extends Controller
{
    public function search(Request $request)
    {
        $kitchens = Kitchen::all();
        $services = Service::all();

        $query = Restaurant::query();

        if ($request->kitchens) {

            $query->whereHas('kitchens', function ($query) use($request) {
                $query->whereIn('slug', $request->kitchens);
            });
        }

        if ($request->services) {
            $query->whereHas('services', function ($query) use($request) {
                $query->whereIn('slug', $request->services);
            });
        }

        if ($request->lat && $request->long && $request->distance) {

            Log::alert($request->lat);
            Log::alert($request->long);
            Log::alert($request->distance);

            $query->isWithinRadius($request->lat, $request->long, $request->distance);
        }

        $query->where('status', '=', 'public');

        $restaurants = $query->paginate(8);

        if ($request->ajax()) {

            $view = view('influencer.restaurant.list',compact('restaurants'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('influencer.search', compact('restaurants','kitchens', 'services'));
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
