<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function mostrarProdutos(){
        $produtos = Produto::all();
        return view('welcome', compact('produtos'));
    }

    public function adicionarCarrinho(){

    }

    public function removerCarrinho(){

    }

    public function fecharPedido(){

    }
}
