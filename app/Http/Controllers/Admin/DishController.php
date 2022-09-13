<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{

    protected $perPage= 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id =  Auth::id();
        $rest_id =  Restaurant::all()->where('user_id', '=', $user_id )->pluck('id')->toArray();

        $dishes = Dish::all()->where('restaurant_id', '=', $rest_id[0]);
        //$rest_id[0] indica il primo elemento del toArray dalla collection di Restaurant

        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_visible = $request->boolean('is_visible');


         // validazione dati
         $request->validate([
            'name'              => 'required|string|max:50',
            'description'       => 'nullable|string|max:100',
            'price'             => 'required|numeric',
            // TODO cambiare nullable in required
            'is_visible'        => 'nullable|boolean'
        ]);


        $user_id =  Auth::id();
        // richiesta dati al db
        $form_data = $request->all();
        $var_temp = Restaurant::all()->where('user_id', '=', $user_id )->pluck('id')->toArray();

        $data = $form_data + [
            // 'restaurant_id' => Auth::id()
            'restaurant_id' =>  $var_temp[0]
        ];
        // creazione dati
        $dish = Dish::create($data);

        // ti mando alla pagina
        return redirect()->route('admin.dish.show', [
            'dish'    => $dish
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
         // validazione dati
         $request->validate([
            'name'              => 'required|string|max:50',
            'description'       => 'nullable|string|max:100',
            'price'             => 'required|numeric',
            // TODO cambiare nullable in required ???
            'is_visible'        => 'nullable|boolean',
        ]);

        // richiesta dati al db
        $form_data = $request->all();

        // creazione dati
        $dish->update($form_data);

        // ti mando alla pagina
        return redirect()->route('admin.dish.show', [
            'dish'    => $dish
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('admin.dish.index');
    }
}
