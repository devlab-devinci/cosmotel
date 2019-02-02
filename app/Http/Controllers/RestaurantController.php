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
        $restaurant->status = 'draft';
        $restaurant->save();

        $services = Service::find($request->services);
        $restaurant->services()->sync($services);

        $kitchens = Service::find($request->kitchens);
        $restaurant->kitchens()->sync($kitchens);

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
        $restaurant = Restaurant::find($id);
        $kitchens = Kitchen::all();
        $services = Service::all();

        return view('restaurant.edit', ['kitchens' => $kitchens, "services" => $services, "current_restaurant" => $restaurant]);
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
        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->description = $request->description;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->update();

        $services = Service::find($request->services);
        $restaurant->services()->sync($services);

        $kitchens = Service::find($request->kitchens);
        $restaurant->kitchens()->sync($kitchens);

        return view('restaurant.show', ['restaurant' => $restaurant]);
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
        //$restaurant = Restaurant::findOrFail($id);
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
