<?php

namespace App\Http\Controllers;

use App\Opening;
use Illuminate\Http\Request;
use Auth;
use App\Restaurant;

class OpeningController extends Controller
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

            foreach($request->data as $key => $value) {
                $newOpening = new Opening;



                $newOpening->restaurant_id = $request->restaurant_id;
                $newOpening->day = $key;

                if (isset($value['open_morning'])) {
                    $newOpening->open_morning = 1;
                    $newOpening->open_time_morning = $value['open_time_morning'];
                    $newOpening->close_time_morning = $value['close_time_morning'];
                }
                else {
                    $newOpening->open_morning = 0;
                }

                if (isset($value['open_lunch'])) {
                    $newOpening->open_lunch = 1;
                    $newOpening->open_time_lunch = $value['open_time_lunch'];
                    $newOpening->close_time_lunch = $value['close_time_lunch'];
                }
                else {
                    $newOpening->open_lunch = 0;
                }

                if (isset($value['open_dinner'])) {
                    $newOpening->open_dinner = 1;
                    $newOpening->open_time_dinner = $value['open_time_dinner'];
                    $newOpening->close_time_dinner = $value['close_time_dinner'];
                }
                else {
                    $newOpening->open_dinner = 0;
                }

                $newOpening->save();
            }

        return view('discounts.create', ['restaurant_id' => $request->restaurant_id]);
    }
}
