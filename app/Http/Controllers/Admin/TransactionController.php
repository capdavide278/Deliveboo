<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id =  Auth::id();
        $rest_id =  Restaurant::all()->where('user_id', '=', $user_id )->pluck('id')->toArray();


            $transaction = Transaction::all()->where('restaurant_id', '=', $rest_id[0]);
        //$rest_id[0] indica il primo elemento del toArray dalla collection di Transaction

        return view('admin.transaction.index', compact('transaction'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chartJs()
    {
        $user_id =  Auth::id();
        $rest_id =  Restaurant::all()->where('user_id', '=', $user_id )->pluck('id')->toArray();


            $transaction = Transaction::all()->where('restaurant_id', '=', $rest_id[0])->orderBy('date', 'desc')->get();
        //$rest_id[0] indica il primo elemento del toArray dalla collection di Transaction

        return view('admin.home', compact('transaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
