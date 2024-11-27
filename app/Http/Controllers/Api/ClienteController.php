<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cliente::where('estado',true);

        if ($request->has('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        $clientes = $query->get();

        return response()->json([
            'value' => $clientes
        ],200);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nro_doc' => 'required|string|max:11|unique:clientes,nro_doc',
            'nombre' => 'required|string|max:80',
            'apellido' => 'required|string|max:80',
            'email' => 'required|email|max:100',
            'direccion' => 'required|string|max:100',
        ]);

        // Crear el cliente
        $cliente = Cliente::create($validatedData);

        // Retornar respuesta JSON
        return response()->json([
            'message' => 'Cliente registrado correctamente'
        ], 201);
    }


    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nro_doc' => 'required|string|max:11|unique:clientes,nro_doc,' . $id,
            'nombre' => 'required|string|max:80',
            'apellido' => 'required|string|max:80',
            'email' => 'required|email|max:100',
            'direccion' => 'required|string|max:100',
        ]);

        // Buscar el cliente por su id
        $cliente = Cliente::findOrFail($id);

        // Actualizar los datos del cliente
        $cliente->update($validatedData);

        // Retornar respuesta JSON
        return response()->json([
            'message' => 'Cliente actualizado correctamente',
            'cliente' => $cliente,
        ], 200);
    }


    public function destroy(string $id)
    {
        // Buscar el cliente por su id
        $cliente = Cliente::findOrFail($id);

        // Cambiar el estado a inactivo
        $cliente->estado = '0';
        $cliente->save();

        // Retornar respuesta JSON
        return response()->json([
            'message' => 'Cliente eliminado correctamente',
        ], 200);
    }

}
