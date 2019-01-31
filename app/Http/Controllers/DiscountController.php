<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;
use Auth;
use App\Restaurant;

class DiscountController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = Restaurant::find($request->restaurant_id);

        if (Auth::user()->restaurateur->id == $restaurant->restaurateur_id) {
            $newDiscount = new Discount;
            $newDiscount->restaurant_id = $request->restaurant_id;
            $newDiscount->discount = $request->discount;
            $newDiscount->subscribers = $request->subscribers;
            $newDiscount->stories = $request->stories;
            $newDiscount->posts = $request->posts;
        }

        return redirect()->route('restaurateur.dashboard');
    }
}
