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
            $query->isWithinRadius($request->lat, $request->long, $request->distance);
        }

        if ($request->discount || $request->eligible) {

            if ($request->discount) {
                $discount = $request->discount;
            }
            else {
                $discount = 0;
            }

            if ($request->eligible) {
                $followers = Auth::user()->influencer->followers;
            }
            else {
                $followers = 999999999999;
            }

            $query->whereHas('discounts', function ($query) use($followers, $discount) {
                $query->where('discount', '>=', $discount);
                $query->where('subscribers', '<=', $followers);
            }, '>=', 1);
        }

        if ($request->day && $request->time && $request->dayTime)  {

            $query->whereHas('openings', function ($query) use($request) {
                $query->where('day', $request->day - 1);
                $query->where('open_'.$request->dayTime, 1);
                $query->whereTime('open_time_'.$request->dayTime, '<=', $request->time);
                $query->whereTime('close_time_'.$request->dayTime, '>=', $request->time);
            }, '>=', 1);
        }

        if ($request->average_price) {

            $query->where('average_price', '<=', $request->average_price);
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
        $influencer = Auth::user()->influencer;

        return view('influencer.restaurant.show', ['restaurant' => $restaurant, 'influencer' => $influencer]);
    }


    public function createReservation(Request $request)
    {
        $influencer = Auth::user()->influencer;
        $discount = Discount::find($request->discount);

        $date = new \DateTime($request->date . ' ' . $request->time);

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
