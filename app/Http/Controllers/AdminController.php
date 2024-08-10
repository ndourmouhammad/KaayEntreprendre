<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //lister la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return $this->customJsonResponse('Liste des utilisateurs' , $users);
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
