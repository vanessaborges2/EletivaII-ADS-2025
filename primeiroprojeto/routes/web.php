<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimeiraController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\InicialCliController;

use App\Http\Middleware\NivelAdmMiddleware;
use App\Http\Middleware\NivelCliMiddleware;

Route::get('/', [CarrinhoController::class, 'mostrarProdutos']);

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/cadastrar', [AuthController::class, 'showFormCadastro']);
Route::post('/cadastrar', [AuthController::class, 'cadastrarUsuario']);

Route::middleware('auth')->group(function (){
    Route::post("/logout", [AuthController::class, "logout"]);

    Route::middleware([NivelAdmMiddleware::class])->group(function () {
        Route::resource('clientes', ClienteController::class);
        Route::get('/inicial-adm', function() { return view("inicial-adm"); });
    });

    Route::middleware([NivelCliMiddleware::class])->group(function () {
        Route::get('/inicial-cli', [InicialCliController::class, 'index']);
        Route::get('/carrinho/add/{id}', 
                        [CarrinhoController::class, 'adicionarCarrinho']);
        Route::get('/carrinho/remove/{id}', 
                        [CarrinhoController::class, 'removerCarrinho']);
        Route::get('/carrinho/fechar', 
                        [CarrinhoController::class, 'fecharPedido']);
    });
    
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

