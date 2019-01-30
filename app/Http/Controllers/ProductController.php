<?php

namespace App\Http\Controllers;

use App\Product;
use App\Restaurant;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
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

        if (Auth::user()->restaurateur->id == $restaurant->restaurateur_id)

        foreach(array_keys($request->products) as $key) {
            $newProduct = new Product;
            $newProduct->restaurant_id = $request->restaurant_id;
            $newProduct->category_id = $request->product_category[$key];
            $newProduct->currency = "€";
            $newProduct->label = $request->products[$key];
            $newProduct->price = $request->prices[$key];

            $newProduct->save();
        }

        $days = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        ];

        $times = [
            'morning',
            'lunch',
            'dinner'
        ];

        return view('openings.create', ['restaurant_id' => $request->restaurant_id, 'days' => $days, 'times' => $times]);
    }
}
