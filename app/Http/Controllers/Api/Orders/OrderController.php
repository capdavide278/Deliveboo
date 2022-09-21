<?php

namespace App\Http\Controllers\Api\Orders;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
            'token' => $token
        ];
        
        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway){
        $result = $gateway->transaction()->sale([
            'amount'    => '10',
            'paymentMethodNonce'    => $request->token,
            'options'   => [
                'submitForSettlement'   => true,
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true, 
                'message'   => 'transazione eseguita'
            ];
        } else {
            $data = [
                'success' => false, 
                'token'   => 'transazione fallita'
            ];
        }
        return response()->json($data, 401);
    }
}
