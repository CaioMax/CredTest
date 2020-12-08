<?php

namespace App\Http\Controllers;

use App\Models\Owners;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owners::select('name','id')->get();

        if($owners->count()==0){
            return response()->json(['msg'=>'Nenhum Propietário cadastrado'], 400);
        }

        return response()->json($owners, 200);
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
            'email' => 'email|required|unique:owners',
            'phone' => 'required|numeric|unique:owners',
            'transfer_day' =>  'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        try{

            //Checking if catch any error on validator
            if($validator->fails()){

                throw new Exception($validator->errors(), 400);

            }else{

                //Creating the info on db
                Owners::create($request->all());

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
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function show(Owners $owners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function edit(Owners $owners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owners $owners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owners  $owners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owners $owners)
    {
        //
    }
}
