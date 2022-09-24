<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Mail\LeadToLead;
use App\Mail\LeadToAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
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
        $form_data = $request->all();
        //validazione

        $validation_rules = [
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|max:256',
            'address' => 'required|string',
            'phonenumber' => 'required|numeric',

        ];

        // $request->validate($validation_rules); //per le route in api.php ritorna un json, se lo avessimo fatto in web.php farebbe il redirect

        $validator = Validator::make($form_data, $validation_rules);

        if($validator->fails()){
            return response()->json([
                    'success' => false,
                    'response' =>$validator->errors(),
                ]);
        }
        try{

            //salvare nel database

            $lead = Lead::create($form_data);

            //inviare mail al lead

            Mail::to($lead->email)->send(new LeadToLead($lead));

            //inviare mail all'admin
            Mail::to('admin@deliveboo.it')->send(new LeadToAdmin($lead));
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'response' => "C\è stato un errore",
            ], 500);
        }

        return response()->json([
            'success' => true,
            'response' => "Messaggio invito",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
