<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\UnidadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
# Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
# Rutas con Auth
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); // logout
    Route::apiResource('clientes', ClienteController::class); // lista de cliente
    Route::get('/productos', [ProductoController::class, 'index']); // lista de productos
    Route::get('/unidades', [UnidadController::class, 'index']); // lista de unidades
    Route::get('/categorias', [CategoriaController::class, 'index']); // lista de categorias
});
Route::get('/validar-token', [AuthController::class, 'validarToken']);