<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class RestaurantController extends Controller
{
    protected $validation_rules = [
        'name_restaurant'   => 'required|string|max:50',
        'address'           => 'required|string|max:255',
        'rest_phonenumber'  => 'nullable|numeric|digits:10',
        'rest_email'        => 'required|email:rfc,dns|unique:restaurants,rest_email',
    ];
    protected $perPage= 10;

    public function index()
    {
        /* $restaurants = Restaurant::all(); */
        //TODO Sistemare metodo all
        $restaurants = Auth::user()->restaurant()->paginate($this->perPage);//restaurants to restaurant

        return view('admin.restaurant.index', compact('restaurants')); //restaurants to restaurant
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $user_id =  Auth::id();
        $rest_id =  Restaurant::all()->where('user_id', '=', $user_id )->pluck('id')->toArray();

        if($rest_id == []){
            return view('admin.restaurant.create', compact('categories'));
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione dati
        $request->validate($this->validation_rules);
        // richiesta dati al db
        $form_data = $request->all();
        $data = $form_data + [
            'user_id' => Auth::id(),
        ];
        // TODO MO CHE POSSIAMO
        // if(key_exists('image', $data)){

        //     $img_path = Storage::put('uploads', $data['image']);

        //     //aggiorniamo il valore della chiave image con il nome dell'img creata
        //     $data['image'] = $img_path;
        // }

        // creazione dati
        $restaurant = Restaurant::create($data);
        if('categories[]'){
            echo 'Inserisci Categorie';
        } else {
            $restaurant->category()->sync($data['categories']);
            // ti mando alla pagina
            return redirect()->route('admin.restaurant.index', [
                'restaurant'    => $restaurant,
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        // return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurant.edit', compact('restaurant'));
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
        // validazione dati
        $request->validate($this->validation_rules);
        // richiesta dati al db
        $data = $request->all();
        // aggiornamento dati nel db
        $restaurant->update($data);

        // renderizzazione alla pagina
        return redirect()->route('admin.restaurant.index', [
            'restaurant'    => $restaurant
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->category()->detach();
        $restaurant->delete();

        return redirect()->route('admin.restaurant.index');

        // no destruction for you today! Pinko!
    }
}
