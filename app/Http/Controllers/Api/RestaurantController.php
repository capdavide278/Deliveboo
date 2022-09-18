<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage_default = 12;
        //request è la richiesta completa dell'utente
        $perPage = $request->query('perPage', 12);

        //se la richiesta è sbagliata
        if($perPage < 1 || $perPage > 150){
            $perPage = $perPage_default;
        }
        $restaurants = Restaurant::with('category', 'dish')->paginate($perPage);

        return response()->json([
            'success' => true,
            'response' =>$restaurants
        ]);


    }

    public function search(Request $request){
        $category = $request->get('category');
//es richiesta url -> /api/restaurants/search?category=8&9
        $restaurantsCat = Restaurant::with(['category'])->whereHas('category', function($q) use ( $category ){
             $q->where('category_id', 'like', $category);
         })->get();
        //   ddd($restaurantsCat);

         if($restaurantsCat){
            return response()->json([
            'success' => true,
            'response' =>$restaurantsCat
        ]);}
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(string $idRest)
    {
        $restaurantApi = Restaurant::with('dish')->where('id', $idRest)->first();
        if($restaurantApi) {
            return response()->json([
                'success' => true,
                'result' =>$restaurantApi
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
