<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Kitchen;
use App\Service;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all()->random(5);

        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    public function create()
    {
        $kitchens = Kitchen::all();
        $services = Service::all();
        return view('restaurateur.restaurant.create', compact('kitchens', 'services'));
    }

    public function store(Request $request)
    {
        $restaurant = new Restaurant;

        $restaurant->restaurateur_id = Auth::user()->restaurateur->id;
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->description = $request->description;
        $restaurant->save();

        foreach($request->kitchens as $kitchen)
        {
            $kitchen = Kitchen::find($kitchen);
            $restaurant->kitchens()->attach($kitchen);
        }

        foreach($request->services as $service)
        {
            $service = Service::find($service);
            $restaurant->services()->attach($service);
        }

        return redirect('/restaurant/create/'.$restaurant->id.'/menu');
    }


    /////////////////////////////
    // FUNCTIONS USE WITH AJAX //
    /////////////////////////////
    public function getOne($id)
    {
        $restaurant = Restaurant::where('id', $id)
            ->with('restaurateur')
            ->with('kitchens')
            ->with('discounts')
            ->first();

        $user = $restaurant->restaurateur->user;

        $data = [
            'restaurant' => $restaurant,
            'user' => $user
        ];
        return redirect('/');
        // return $data;
    }
}
