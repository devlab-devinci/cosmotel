<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

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

    public function getOne($id)
    {
//        $restaurant = Restaurant::findOrFail($id);
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
        return $data;
    }
}
