<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function mostrarProdutos(){
        $produtos = Produto::all();
        return view('welcome', compact('produtos'));
    }

    public function adicionarCarrinho(int $id){
        $user = Auth::user();
        $produto = Produto::findOrFail($id);
        $pedido = Pedido::firstOrCreate([
            'user_id' => $user->id,
            'status' => 'aberto'
        ], []);
    }

    public function removerCarrinho(){

    }

    public function fecharPedido(){

    }
}
