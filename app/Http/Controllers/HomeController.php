<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Monthly_Payment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contracts = Contracts::all();
        return view('home',compact('contracts'));

    }

    public function creates()
    {

        return view('creates');

    }

    public function months($id){

        $monthly_payments = Monthly_Payment::where('fk_contract',$id)->get();
        return view('months',compact('monthly_payments'));

    }
}
