<?php

namespace App\Http\Controllers;

use App\Product;
use App\Restaurant;
use App\ProductCategory;
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

        if (Auth::user()->restaurateur->id == $restaurant->restaurateur_id) {

            foreach($request->products as $product) {

                $newProduct = new Product;
                $newProduct->restaurant_id = $request->restaurant_id;
                $newProduct->category_id = $product['category_id'];
                $newProduct->currency = "€";
                $newProduct->label = $product['label'];
                $newProduct->price = $product['price'];

                $newProduct->save();
            }

            $days = array(
                (object) [
                    'label' => 'Monday',
                    'index' => '0'
                ],
                (object) [
                    'label' => 'Tuesday',
                    'index' => '1'
                ],
                (object) [
                    'label' => 'Wednesday',
                    'index' => '2'
                ],
                (object) [
                    'label' => 'Thursday',
                    'index' => '3'
                ],
                (object) [
                    'label' => 'Friday',
                    'index' => '4'
                ],
                (object) [
                    'label' => 'Saturday',
                    'index' => '5'
                ],
                (object) [
                    'label' => 'Sunday',
                    'index' => '6'
                ],
            );

            $times = [
                'morning',
                'lunch',
                'dinner'
            ];

            return view('restaurateur.opening.create', ['restaurant_id' => $request->restaurant_id, 'days' => $days, 'times' => $times]);
        }

        return redirect()->action('RestaurateurController@dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_categories = ProductCategory::all();
        $restaurant = Restaurant::find($id);

        return view('restaurateur.product.edit', ['current_products' => $restaurant->products, 'restaurant_id' => $id, 'product_categories' => $product_categories]);
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

            foreach ($request->products as $product) {

                if ($product['id'] && $product['category_id'] == 'delete') {
                    Product::destroy($product['id']);
                }
                else {
                    if ($product['id']) {
                        $newProduct = Product::find($product['id']);
                        $newProduct->restaurant_id = $request->restaurant_id;
                        $newProduct->category_id = $product['category_id'];
                        $newProduct->currency = "€";
                        $newProduct->label = $product['label'];
                        $newProduct->price = $product['price'];

                        $newProduct->update();
                    } else {
                        $newProduct = new Product;
                        $newProduct->restaurant_id = $request->restaurant_id;
                        $newProduct->category_id = $product['category_id'];
                        $newProduct->currency = "€";
                        $newProduct->label = $product['label'];
                        $newProduct->price = $product['price'];

                        $newProduct->save();
                    }
                }
            }
            return view('restaurateur.restaurant.show', ['restaurant' => $restaurant]);
        }
        return redirect()->action('RestaurateurController@dashboard');
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
}
