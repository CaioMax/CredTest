<?php

namespace App\Http\Controllers;

use App\Models\Monthly_Payment;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class Monthly_PaymentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $contract)
    {
        //Creating the monthly payments for frist month
        $now = Carbon::now();

        $monthy_value = null;

        $data = null;

        if( $now->day !== 1){

            $diff = $now->diffInDays(new Carbon('first day of next month'));

            $day_value =  ($request->rent_amount + $request->condo_fee + $request->iptu) / $now->daysInMonth;

            $data = [
                'fk_contract' => $contract,
                'reference' => $now->month . '/' . $now->year,
                'payment_value' => number_format($day_value * $diff,2,'.',''),
                'payment_status' => 0,
                'transfer_value' =>number_format((1 - $request->admin_fee) * ( ( ($request->rent_amount + $request->iptu) / $now->daysInMonth) * $diff),2,'.',''),
                'transfer_status' => 0
            ];

        }

        $data = [
            'fk_contract' => $contract,
            'reference' => $now->month . '/' . $now->year,
            'payment_value' => number_format($request->rent_amount + $request->condo_fee + $request->iptu,2,'.',''),
            'payment_status' => 0,
            'transfer_value' => number_format((1 - $request->admin_fee) * ($request->rent_amount + $request->iptu),2,'.',''),
            'transfer_status' => 0
        ];

        Monthly_Payment::create($data);

        //Creating the monthly payments for next 11 months
        for($i=1; $i<12; $i++){

            $data = [
                'fk_contract' => $contract,
                'reference' => $now->addMonths(1)->month . '/' . $now->year,
                'payment_value' => number_format($request->rent_amount + $request->condo_fee + $request->iptu,2,'.',''),
                'payment_status' => 0,
                'transfer_value' => number_format((1 - $request->admin_fee) * ($request->rent_amount + $request->iptu),2,'.',''),
                'transfer_status' => 0
            ];

            Monthly_Payment::create($data);

        }

        return;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try{

            Monthly_Payment::where('id',$request->id)->update($request->except('id'));

            return response()->json(['message' => "Success"], 200);

        }catch (Exception $e) {

            //If any error happend return a json with the error
            return response()->json($e->getMessage(), $e->getCode());

        }


    }

}


