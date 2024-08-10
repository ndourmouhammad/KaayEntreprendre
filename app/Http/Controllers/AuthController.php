<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Création d'un nouvel utilisateur
    public function register(Request $request)
    {
       $validator = validator($request->all(), [
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:8',
           'password_confirmation' => 'required|same:password',
           'photo' => 'required|mimes:jpeg,jpg,png|max:2048',
           'adresse' => 'required|string|max:255',
           'telephone' => 'required|string|max:20|min:9|unique:users',
           'statut' => 'required|boolean',
           'cv' => 'mimes:pdf,doc,docx,jpeg,jpg,png|max:2048',
           'secteur_activite_id' => 'required|exists:secteur_activites,id'
       ]);  

       if ($validator->fails()) {
           return response()->json(['error' => $validator->errors()], 400);
       }

       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'photo' => $request->file('photo')->store('public/photos'),
           'adresse' => $request->adresse,
           'telephone' => $request->telephone,
           'statut' => $request->statut,
           'cv' => $request->file('cv')->store('public/cv'),
           'secteur_activite_id' => $request->secteur_activite_id
       ]);

       return response()->json(['user' => $user], 201);
    }

    // Connexion d'un utilisateur

    public function login(Request $request){

        // Validation
        $validator = validator($request->all(), [
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json(["errors" => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');
        $tocken = auth()->attempt($credentials);

        

        if(!$tocken){
            return response()->json(["message" => "Informations incorrects"], 401);
        }

        return response()->json([
            "access_token" => $tocken,
            "token_type" => "Bearer",
            "user" => auth()->user(),
            "expires_in" => env('JWT_TTL')*60 . " secondes"
        ]);

    }

    // Logout API - POST
    public function logout(){
        auth()->logout();
        return response()->json(["message" => "Vous avez bien été deconnecté"]);
    }

    // Refresh API - POST
    public function refreshToken(){

        $token = auth()->refresh();

        return response()->json([
            "access_token" => $token,
            "token_type" => "Bearer",
            "user" => auth()->user(),
            "expires_in" => env('JWT_TTL')*60 . " secondes"
        ]);
    }

    
}
