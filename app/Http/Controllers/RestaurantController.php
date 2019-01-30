<?php

namespace App\Http\Controllers;

use App\Kitchen;
use App\Service;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Restaurateur;
use App\RestaurantService;
use App\RestaurantKitchen;
use App\Discount;
use Auth;
use App\ProductCategory;

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
        $restaurateur = Auth::user()->restaurateur;
        $restaurants = $restaurateur->restaurants;

        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kitchens = Kitchen::all();
        $services = Service::all();

        return view('restaurant.create', ['kitchens' => $kitchens, "services" => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurateur = Auth::user()->restaurateur;
        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->description = $request->description;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->restaurateur_id = $restaurateur->id;
        $restaurant->save();

        $services = $request->services;

        foreach ($services as $service)
        {
            $restaurant_service = new RestaurantService;
            $restaurant_service->restaurant_id = $restaurant->id;
            $restaurant_service->service_id = $service;
            $restaurant_service->save();
        }

        $kitchens = $request->kitchens;
        foreach ($kitchens as $kitchen)
        {
            $restaurant_kitchen = new RestaurantKitchen;
            $restaurant_kitchen->restaurant_id = $restaurant->id;
            $restaurant_kitchen->kitchen_id = $kitchen;
            $restaurant_kitchen->save();
        }

        $product_categories = ProductCategory::all();

        return view('products.create', ['restaurant_id' => $restaurant->id, 'product_categories' => $product_categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        return view('restaurant.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    public function reservations($id){
        $restaurant = Restaurant::find($id);

        return $restaurant->reservation;
    }
}
