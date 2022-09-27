<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    protected $perPage= 10;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = [];

    for ($i = 1; $i < 13; $i++) {
                $dateFrom = date('Y') . '-' . $i . '-01';
                $dateTo = date('Y') . '-' . $i . '-31';
                $user_id =  Auth::id();
                $rest_id =  Restaurant::all()->where('user_id', '=', $user_id )->pluck('id')->toArray();

                if($rest_id[0] =! null){
                    $transaction = Transaction::where('restaurant_id', '=', $rest_id[0])->whereBetween('date', [$dateFrom, $dateTo])->get();
                    $transactions[$i] = count($transaction);

                }

            }

        $restaurants = Auth::user()->restaurant()->paginate($this->perPage);
        return view('admin.home', [
            'restaurants' => $restaurants,
            'transactions' => $transactions
        ]);
    }
}
