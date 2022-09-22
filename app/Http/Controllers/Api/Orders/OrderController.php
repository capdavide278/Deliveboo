<?php

namespace App\Http\Controllers\Api\Orders;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Dish;

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
        $dish = Dish::find($request->dish);
        $result = $gateway->transaction()->sale([
            'amount'    => $dish->price,
            'paymentMethodNonce'    => $request->token,
            'options'   => [
                'submitForSettlement'   => true,
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true, 
                'message'   => 'transazione eseguita',
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false, 
                'message'   => 'transazione fallita'
            ];
            return response()->json($data, 401);
        }
        return 'makepayment';
    }
}
