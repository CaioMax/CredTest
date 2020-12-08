<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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

        $messages = [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute field is invalid.',
            'after' => 'The end date is invalid',
            'date' => 'Date or format invalid'
        ];

        //Validation rules
        $rules = [
            'fk_client' => 'required|numeric',
            'fk_owner' => 'required|numeric',
            'fk_propertie' => 'required|numeric',
            'dt_start' => 'required|date_format:Y-m-d',
            'dt_end' => 'required|date_format:Y-m-d|after:today',
            'admin_fee' => 'required|numeric',
            'rent_amount' => 'required|numeric',
            'condo_fee' => 'required|numeric',
            'iptu' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);


            //Checking if catch any error on validator
            if($validator->fails()){

                throw new Exception($validator->errors(), 400);

            }else{

                //Creating the info on db
                $contract = Contracts::create($request->all());

                //Call the method for insert the 12 monthy payments
                $monthly_payment= new Monthly_PaymentController;
                $monthly_payment->store($request, $contract->id);

                //If Success return a json with code 200
                return response()->json(['message' => "Success"], 200);
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function show(Contracts $contracts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contracts $contracts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contracts $contracts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contracts  $contracts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contracts $contracts)
    {
        //
    }
}
