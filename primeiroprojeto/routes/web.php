<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimeiraController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/cadastrar', [AuthController::class, 'showFormCadastro']);
Route::post('/cadastrar', [AuthController::class, 'cadastrarUsuario']);

Route::middleware('auth')->group(function (){
    Route::resource('clientes', ClienteController::class);
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::get('/inicial', function() { return view("inicial"); })->name('inicial');
});



//Listar Clientes - GET /clientes -- Route::get('/clientes', [ClienteController::class, 'index'])
//Abrir formulário para inserir registro - GET /clientes/create -- [ClienteController::class, 'create']
//Salvar dados - POST /clientes -- método store
//Mostrar dados do registro - GET /clientes/{id_cliente} -- método show
//Abrir formulário para editar registro - GET /clientes/{id_cliente}/edit --método edit
//Salvar alterações - PUT /clientes/{id_cliente} -- método update
//Excluir um registro - DELETE /clientes/{id_cliente} -- método destroy














Route::get('/teste', [PrimeiraController::class, "teste"]);

Route::get('/exemplo', [PrimeiraController::class, "abrirForm"]);
Route::post('/exemplo_resposta', [PrimeiraController::class, "resposta"]);

Route::get("/exercicio2", [PrimeiraController::class, "exercicio2"]);
Route::post("/resposta_exercicio2", [PrimeiraController::class, "respExercicio2"]);

