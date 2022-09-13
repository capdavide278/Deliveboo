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
        $rest_id =  Restaurant::all()->where('user_id', '=', $user_id )->pluck('id');

        $dishes = Dish::all()->where('restaurant_id', '=', $rest_id);
        dump('user id = ' . $user_id);
        dump('rest id = ' . $rest_id);
        dump('dishes  = ' . $dishes);





        // return view('admin.restaurant.index', compact('restaurants'));

        // $dishes = Dish::all();

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



        // richiesta dati al db
        $form_data = $request->all();
        $data = $form_data + [
            'restaurant_id' => Auth::id(),
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
            // TODO cambiare nullable in required
            'is_visible'        => 'nullable|boolean',
        ]);
        // richiesta dati al db
        $data = $request->all();

        // creazione dati
        $dish = Dish::create($data);

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
