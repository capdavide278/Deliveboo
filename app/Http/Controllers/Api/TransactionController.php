<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
public function store(Request $request){


// $request->validate([
//     'name'   => 'required|string|max:50',
//     'lastname'   => 'required|string|max:50',
//     'address'           => 'required|string|max:255',
//     'phonenumber'  => 'nullable|numeric|digits:10',
//     'email'        => 'required|email:rfc,dns|unique:restaurants,rest_email',
//     'total' => 'required|numeric'
// ]);

$form_data= $request->all();
// $cart = $form_data['cart'];


$transaction = new Transaction();
$transaction->restaurant_id = $form_data['restaurant_id'];
$transaction->name = $form_data['name'];
$transaction->lastname = $form_data['lastname'];
$transaction->email = $form_data['email'];
$transaction->address = $form_data['address'];
$transaction->phonenumber = $form_data['phonenumber'];
$transaction->total = $form_data['total'];
$transaction->save();

// $transaction->dish()->sync($data['dish']);

return response()->json([
    'success'   => true
]);
}
}
