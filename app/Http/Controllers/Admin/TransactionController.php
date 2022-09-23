<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $request->validate([
        //     'name'   => 'required|string|max:50',
        //     'lastname'   => 'required|string|max:50',
        //     'address'           => 'required|string|max:255',
        //     'phonenumber'  => 'nullable|numeric|digits:10',
        //     'email'        => 'required|email:rfc,dns|unique:restaurants,rest_email',
        //     'total' => 'required|numeric'
        // ]);

        // $form_data= $request->all();



        // $data = $form_data + [
        //     'restaurant_id' => Restaurant::id(),
        // ];

        // $transaction = Transaction::create($data);
        // // $transaction->dish()->sync($data['dish']);
        // // $transaction->dish()->sync($data['dish',
        // // 'quantity' => json_decode($dish)->quantity]);


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
