<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //lister la liste des utilisateurs
    public function index()
{
    // Charge les utilisateurs avec leurs rôles
    $users = User::with('roles')->get();
    
    // Retourne la réponse JSON personnalisée avec les utilisateurs et leurs rôles
    return $this->customJsonResponse('Liste des utilisateurs', $users);
}

// Trouver un utilisateur par son ID
public function show($id)
{
    // Trouver l'utilisateur avec ses rôles associés
    $user = User::with('roles')->find($id);
    
    // Vérifiez si l'utilisateur existe
    if (!$user) {
        return $this->customJsonResponse('Utilisateur non trouvé', null, 404);
    }
    
    // Retourner la réponse JSON avec l'utilisateur et ses rôles
    return $this->customJsonResponse('Utilisateur', $user);
}



    // Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $this->customJsonResponse('Utilisateur supprimé', $user);
    }

    // Changer le role d'un utilisateur avec assign role (coach ou entrepreneur)
    public function changeRole(Request $request, $id)
    {
        $user = User::find($id);
        $user->assignRole($request->role);
        return $this->customJsonResponse('Role mis a jour', $user);
    }

    // Activer un utilisateur (en changeant la valeur de son status à 1)
    public function activate($id)
    {
        $user = User::find($id);
        $user->statut = 1;
        $user->save();
        return $this->customJsonResponse('Utilisateur active', $user);
    }

   // Desactiver un utilisateur (en changeant la valeur de son status à 0)
    public function deactivate($id)
    {
        $user = User::find($id);
        $user->statut = 0;
        $user->save();
        return $this->customJsonResponse('Utilisateur desactive', $user);
    } 
}
