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

            foreach ($request->discounts as $discount) {

                $newDiscount = new Discount;
                $newDiscount->restaurant_id = $request->restaurant_id;
                $newDiscount->discount = $discount['discount'];
                $newDiscount->subscribers = $discount['subscribers'];
                $newDiscount->stories = $discount['stories'];
                $newDiscount->posts = $discount['posts'];

                $newDiscount->save();
            }
        }

        return redirect()->route('restaurateur::restaurant.show', $request->restaurant_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);

        return view('restaurateur.discount.edit', ['restaurant_id' => $id, 'current_discounts' => $restaurant->discounts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $restaurant = Restaurant::find($request->restaurant_id);

        if (Auth::user()->restaurateur->id == $restaurant->restaurateur_id) {

            foreach ($request->discounts as $discount) {

                if ($discount['id'] && $discount['discount'] == 'delete') {
                    discount::destroy($discount['id']);
                }
                else {
                    if ($discount['id']) {
                        $newDiscount = Discount::find($discount['id']);
                        $newDiscount->restaurant_id = $request->restaurant_id;
                        $newDiscount->discount = $discount['discount'];
                        $newDiscount->subscribers = $discount['subscribers'];
                        $newDiscount->stories = $discount['stories'];
                        $newDiscount->posts = $discount['posts'];

                        $newDiscount->update();
                    } else {
                        $newDiscount = new Discount;
                        $newDiscount->restaurant_id = $request->restaurant_id;
                        $newDiscount->discount = $discount['discount'];
                        $newDiscount->subscribers = $discount['subscribers'];
                        $newDiscount->stories = $discount['stories'];
                        $newDiscount->posts = $discount['posts'];

                        $newDiscount->save();
                    }
                }
            }
            return view('restaurateur.restaurant.show', ['restaurant' => $restaurant]);
        }
        return redirect()->action('RestaurateurController@dashboard');
    }
}
