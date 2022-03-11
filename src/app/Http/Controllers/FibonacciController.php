<?php

namespace App\Http\Controllers;

use App\Models\Fibonacci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TetsMail;

class FibonacciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function apipost(){

        $today = date("h:i:s" ,  strtotime('-5 hour'));
        $arrayDate = explode(":", $today);
        $numbersSeed=$arrayDate[1];
        $ArrayNumbersFibonnaci = [intval($numbersSeed[0]), intval($numbersSeed[1]), (intval($numbersSeed[0])+intval($numbersSeed[1]))];
        $count = 0;
        $countArray= 2;
        
        //var_dump($today);
        //var_dump($ArrayNumbersFibonnaci);
        $numberCountFibonacci = intval($arrayDate[2]);

        while($count<$numberCountFibonacci-1){

           array_push( $ArrayNumbersFibonnaci, $ArrayNumbersFibonnaci[$countArray] +$ArrayNumbersFibonnaci[$countArray-1]);
            $countArray = $countArray+1; 
            $count = $count+1; 
        }
        $msg=[
            'numero_semilla_1'=>$numbersSeed[0],
            'numero_semilla_2'=>$numbersSeed[1],
            "Numero_de_veces_repetir" =>strval($numberCountFibonacci),
            "hora"=> $today,
            "serie"=>json_encode($ArrayNumbersFibonnaci)
        ];
        Mail::to("chamogomez@gmail.com")->send(new TetsMail($msg));
        Mail::to("juan.gomezh@proteccion.com.co")->send(new TetsMail($msg));
        Mail::to("correalondon@gmail.com")->send(new TetsMail($msg));
        Mail::to("cmvargase@gmail.com")->send(new TetsMail($msg));
        Mail::to("cmvargase@hotmail.com")->send(new TetsMail($msg));
       
        



        
        return response()->json([
            "message"=>"ok",
            "numeros_semilla"=>$numbersSeed,
            "hora"=>$today,
            "serie"=>$ArrayNumbersFibonnaci
        ], 200);
    }
    public function index()
    {
        $today = date("h:i:s");
        $arrayDate = explode(":", $today);
        $numbersSeed=$arrayDate[1];
        $ArrayNumbersFibonnaci = [intval($numbersSeed[0]), intval($numbersSeed[1]), (intval($numbersSeed[0])+intval($numbersSeed[1]))];
        $count = 0;
        $countArray= 2;
        var_dump($today);
        //var_dump($ArrayNumbersFibonnaci);
        $numberCountFibonacci = intval($arrayDate[2]);

        while($count<$numberCountFibonacci-1){

           array_push( $ArrayNumbersFibonnaci, $ArrayNumbersFibonnaci[$countArray] +$ArrayNumbersFibonnaci[$countArray-1]);
            $countArray = $countArray+1; 
            $count = $count+1; 
        }

        var_dump($ArrayNumbersFibonnaci);
        return view('fibonacci.home');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fibonacci  $fibonacci
     * @return \Illuminate\Http\Response
     */
    public function show(Fibonacci $fibonacci)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fibonacci  $fibonacci
     * @return \Illuminate\Http\Response
     */
    public function edit(Fibonacci $fibonacci)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fibonacci  $fibonacci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fibonacci $fibonacci)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fibonacci  $fibonacci
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fibonacci $fibonacci)
    {
        //
    }
}
