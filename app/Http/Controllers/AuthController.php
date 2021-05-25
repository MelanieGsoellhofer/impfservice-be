<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct() {
        // die Login-Route muss öffentlich sein (except->login). Alle Anderen sollen durch die Authentication durch!
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login() {
        // wir bekommen die Daten vom REST
        $credentials = request(['email', 'password']);

        // Überprüfung durchführen
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // wenn alles passt -> return Token
        return $this->respondWithToken($token);

    }

    /*
   public function me(){
        return response()->json(['message' => 'Successfully logged out']);
    } */


    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'logged out!']);
    }

   // Aktualisiert aktuellen Token (ansonsten läuft er ab!)
    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }


    // Return-Token
    // Zurückgegeben wird ein Array
    // Das bekommen wir zurück, beim Login
    protected function respondWithToken(string $token) {
        return response()->json([
            'access_token' => $token,
            // Typ: bearer
            'token_type' => 'bearer',
            // Token expires in XY Minuten
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}
