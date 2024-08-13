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
    // Validation des données
    $validator = validator($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'password_confirmation' => 'required|same:password',
        'photo' => 'required|mimes:jpeg,jpg,png|max:2048',
        'adresse' => 'required|string|max:255',
        'telephone' => 'required|string|max:20|min:9|unique:users',
        'role' => 'required|string|in:entrepreneur,coach',
        'cv' => 'mimes:pdf,doc,docx,jpeg,jpg,png|max:2048',
        'secteur_activite_id' => 'required|exists:secteur_activites,id'
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    // Définir le statut en fonction du rôle
    $statut = $request->role === 'coach' ? 0 : 1;

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'photo' => $request->file('photo')->store('public/photos'),
        'adresse' => $request->adresse,
        'telephone' => $request->telephone,
        'secteur_activite_id' => $request->secteur_activite_id,
        'statut' => $statut,
        'cv' => $request->file('cv')->store('public/cv')
    ]);

    // Assigner le rôle à l'utilisateur en fonction de la valeur du champ 'role'
    if ($request->role === 'entrepreneur') {
        $user->assignRole('entrepreneur');
    } elseif ($request->role === 'coach') {
        $user->assignRole('coach');
    }

    return response()->json(['user' => $user], 201);
}



    // Connexion d'un utilisateur

    public function login(Request $request)
    {

        // Validation
        $validator = validator($request->all(), [
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');
        $tocken = auth()->attempt($credentials);



        if (!$tocken) {
            return response()->json(["message" => "Informations incorrects"], 401);
        }

        return response()->json([
            "access_token" => $tocken,
            "token_type" => "Bearer",
            "user" => auth()->user(),
            "expires_in" => env('JWT_TTL') * 60 . " secondes"
        ]);
    }

    // Logout API - POST
    public function logout()
    {
        auth()->logout();
        return response()->json(["message" => "Vous avez bien été deconnecté"]);
    }

    // Refresh API - POST
    public function refreshToken()
    {

        $token = auth()->refresh();

        return response()->json([
            "access_token" => $token,
            "token_type" => "Bearer",
            "user" => auth()->user(),
            "expires_in" => env('JWT_TTL') * 60 . " secondes"
        ]);
    }

    // Modifier mes informations

    public function update(Request $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();

        // Valider les nouvelles informations
        $validator = validator($request->all(), [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'photo' => 'sometimes|nullable|mimes:jpeg,jpg,png|max:2048',
            'adresse' => 'sometimes|string|max:255',
            'telephone' => 'sometimes|string|max:20|min:9|unique:users,telephone,' . $user->id,
            'secteur_activite_id' => 'sometimes|required|exists:secteur_activites,id',
            'statut' => 'sometimes|boolean',
            'cv' => 'sometimes|mimes:pdf,doc,docx,jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Mettre à jour les informations de l'utilisateur
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'photo' => $request->file('photo') ? $request->file('photo')->store('public/photos') : $user->photo,
            'adresse' => $request->adresse ?? $user->adresse,
            'telephone' => $request->telephone ?? $user->telephone,
            'secteur_activite_id' => $request->secteur_activite_id ?? $user->secteur_activite_id,
            'statut' => $request->statut ?? $user->statut,
            'cv' => $request->file('cv') ? $request->file('cv')->store('public/cvs') : $user->cv,
        ]);

        return response()->json(['user' => $user], 200);
    }

    // Demande d'accompagnement personnalisé

    public function demanderAccompagnement(Request $request)
    {
        
    }
}
