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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
# Cliente
Route::get('/clientes', [ClienteController::class, 'index']);
# Producto
Route::get('/productos', [ProductoController::class, 'index']);
# Categoria
Route::get('/categorias', [CategoriaController::class, 'index']);
# Unidad
Route::get('/unidades', [UnidadController::class, 'index']);
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/clientes', [ClienteController::class, 'index']);
// });