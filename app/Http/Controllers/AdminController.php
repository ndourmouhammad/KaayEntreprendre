<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //lister la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return $this->customJsonResponse('Liste des utilisateurs' , $users);
    }
    public function show(){
      $user=Auth::user();
      return response()->json($user);
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
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validation des autres champs
        // $validatedData = $request->validate([
        //     'name' => 'string|max:255',
        //     'email' => 'string|email|max:255',
        //     'secteuractivite_id' => 'integer',
        //     'adresse' => 'string|max:255',
        //     'telephone' => 'string|max:15',
        //     'statut' => 'boolean',
        //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        // ]);
    
        // Gérer l'upload de la photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
        }
    
        // Gérer l'upload du CV
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
            $user->cv = $cvPath;
        }
    
        // Mettre à jour les autres champs
        // $user->fill($validatedData);
        // Sauvegarder les modifications;
        $user->update($request->all());
    
        return response()->json(['message' => 'Profil mis à jour avec succès', 'user' => $user]);
    }
    
    
    
    

}
