<?php

use App\Http\Controllers\SurfistaController;
use App\Http\Controllers\BateriaController;
use App\Http\Controllers\OndaController;
use App\Http\Controllers\NotaController;

// Rotas para o controller Surfista
Route::post('/surfistas', [SurfistaController::class, 'inserirSurfista']);
Route::get('/surfistas', [SurfistaController::class, 'obterSurfistas']);

// Rotas para o controller Bateria
Route::post('/baterias', [BateriaController::class, 'criarBateria']);
Route::get('/baterias/{id}/vencedor', [BateriaController::class, 'obterVencedorBateria']);

// Rotas para o controller Onda
Route::post('/ondas', [OndaController::class, 'cadastrarOnda']);

// Rotas para o controller Nota
Route::post('/notas', [NotaController::class, 'cadastrarNota']);    