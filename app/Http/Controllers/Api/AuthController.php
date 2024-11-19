<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|max:255|unique:users',
                'password'  => 'required|string'
            ]);

        if ($validator->fails()) {
        return response()->json($validator->errors());
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'       => 'Success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);

    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
                'email'     => 'required|string|max:255',
                'password'  => 'required|string'
            ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials    =   $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }

        $user   = User::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);

    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Logout successfull']);
    }

    public function validarToken(Request $request)
    {
        // Obtenemos el token desde los parámetros de la solicitud GET
        $token = $request->query('token');

        // Validamos que el token no esté vacío
        if (empty($token)) {
            return response()->json(['valid' => false, 'message' => 'Token no proporcionado'], 400);
        }

        // Utilizamos el método findToken para buscar el token en la base de datos
        $accessToken = PersonalAccessToken::findToken($token);

        // Verificamos si el token existe
        if ($accessToken) {
            // Verificamos si el token ha expirado
            if ($accessToken->expires_at && now()->greaterThan($accessToken->expires_at)) {
                return response()->json(['valid' => false, 'message' => 'Token expirado'], 401);
            }

            // Opcionalmente, puedes verificar si el usuario asociado está activo
            // if (! $accessToken->tokenable->isActive()) {
            //     return response()->json(['valid' => false, 'message' => 'Usuario inactivo'], 403);
            // }

            return response()->json(['valid' => true, 'message' => 'Token válido'], 200);
        } else {
            return response()->json(['valid' => false, 'message' => 'Token inválido'], 401);
        }
    }

}
