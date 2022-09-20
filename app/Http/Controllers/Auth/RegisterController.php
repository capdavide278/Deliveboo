<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::CREATE_REST; //At the firs Register create a restaurant

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
            return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required','string','max:20'],
            'phonenumber' => ['nullable','numeric','digits:10'],
            'p_iva' => ['required','numeric','unique:users','digits:11'],
            'date_of_birth' => ['nullable','date'],
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
        ]);
        
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // create per i dati nuovi dell'user
        
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phonenumber' => $data['phonenumber'],
            'p_iva' => $data['p_iva'],
            'date_of_birth' => $data['date_of_birth'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    
        
    }
}
