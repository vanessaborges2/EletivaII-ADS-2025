<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimeiraController;

Route::get('/teste', [PrimeiraController::class, "teste"]);

Route::get('/exemplo', [PrimeiraController::class, "abrirForm"]);
Route::post('/exemplo_resposta', [PrimeiraController::class, "resposta"]);

Route::get("/exercicio2", [PrimeiraController::class, "exercicio2"]);
Route::post("/resposta_exercicio2", [PrimeiraController::class, "respExercicio2"]);

