<?php

namespace App\Http\Controllers\Api\Orders;

use App\Models\Dish;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway){

        $token = $gateway->clientToken()->generate();

        return response()->json([
            'success'   => true,
            'token' => $token
        ]);
    }
    public function makePayment(OrderRequest $request, Gateway $gateway){

        // $product = Dish::find($request->product);

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){

            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo',
            ];

            return response()->json($data,200);

        }else {

            $data = [
                'success' => false,
                'message' => 'Transazione fallita!',
            ];

            return response()->json($data,401);

        }
        return 'make Payment';
    }
}
