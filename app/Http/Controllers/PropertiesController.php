<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $properties = Properties::where('fk_owner',$id)->get();

        if($properties->count()==0){
            return response()->json(['msg'=>'Propeietário sem imóveis cadstrados'], 400);
        }

        return response()->json($properties, 200);
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
            'required' => 'The :attribute field is required.'
        ];

        //Validation rules
        $rules = [
            'fk_owner' => 'required',
            'address' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        try{

            //Checking if catch any error on validator
            if($validator->fails()){

                throw new Exception($validator->errors(), 400);

            }else{

                //Creating the info on db
                Properties::create($request->all());

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
     * @param  \App\Models\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function show(Properties $properties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function edit(Properties $properties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Properties $properties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties  $properties
     * @return \Illuminate\Http\Response
     */
    public function destroy(Properties $properties)
    {
        //
    }
}
