<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeiraController extends Controller
{
    
    public function teste(){
        return "Teste em Laravel";
    }

    public function abrirForm(){
        return view("exemplo");
    }

    public function resposta(Request $request){
        $valor1 = $request->valor1;
        $valor2 = $request->valor2;
        $soma = $valor1 + $valor2;
        return "Soma: ".$soma;
    }

}
