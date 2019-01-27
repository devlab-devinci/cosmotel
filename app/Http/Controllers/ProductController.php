<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create($restaurant_id)
    {
        $categories = ProductCategory::all();
        return view('restaurateur.menu.create', compact('categories', 'restaurant_id'));
    }

    public function store(Request $request, $restaurant_id)
    {
        $product = new Product;
        $product->label = $request->label;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->restaurant_id = $restaurant_id;
        $product->save();

        return 'Tout est ok !';
    }

/*    public function store(Request $request)
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

        return route('restaurant::create::product');

    }*/
}
