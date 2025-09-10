<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Categoria;
use Illuminate\Suport\Facades\Log;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view("clientes.index", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view("clientes.create", compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Cliente::create($request->all());
            return redirect()->route("clientes.index")
                    ->with("sucesso", "Registro inserido!");
        } catch(\Exception $e){
            Log::error("Erro ao salvar o registro do cliente! ".$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("clientes.index")
                    ->with("erro", "Erro ao inserir!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view("clientes.show", compact("cliente"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $categorias = Categoria::all();
        return view("clientes.edit", compact("cliente", "categorias"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            return redirect()->route("clientes.index")
                    ->with("sucesso", "Registro alterado!");
        } catch(\Exception $e){
            Log::error("Erro ao alterar o registro do cliente! ".$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("clientes.index")
                    ->with("erro", "Erro ao alterar!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            return redirect()->route("clientes.index")
                    ->with("sucesso", "Registro excluído!");
        } catch(\Exception $e){
            Log::error("Erro ao excluir o registro do cliente! ".$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return redirect()->route("clientes.index")
                    ->with("erro", "Erro ao excluir!");
        }
    }
}
