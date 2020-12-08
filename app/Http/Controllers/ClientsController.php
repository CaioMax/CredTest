<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::select('name','id')->get();

        if($clients->count()==0){
            return response()->json(['msg'=>'Nenhum Cliente Cadastrado'], 400);
        }

        return response()->json($clients, 200);
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

        //Messages if catch any error on validator
        $messages = [
            'required' => 'The :attribute field is required.',
            'email' => `The :attribute sent it isn't valid.`,
            'numeric' => 'The :attribute field is invalid.',
            'unique' => 'The :attribute is already exist'
        ];

        //Validation rules
        $rules = [
            'name' => 'required',
            'email' => 'email|required|unique:clients',
            'phone' => 'required|numeric|unique:owners'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        try{

            //Checking if catch any error on validator
            if($validator->fails()){

                throw new Exception($validator->errors(), 400);

            }else{

                //Creating the info on db
                Clients::create($request->all());

                //If Success return a json with code 200
                return response()->json(['message' => "Success"], 200);
            }

        }catch (Exception $e) {

            //If any error happend return a json with the error
            return response()->json($e->getMessage(), $e->getCode());

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
