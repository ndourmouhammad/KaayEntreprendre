<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //lister les roles dans mon api
    public function index()
    {
        $roles = Role::all();
        return $this->customJsonResponse('List des roles', $roles);
    }

    // creer un role dans mon api
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        return $this->customJsonResponse('Le role a bien été crée', $role);
    }

    // supprimer un role dans mon api
    public function destroy($id)
    {
        $role = Role::find($id);
        
        // Liste des rôles qui ne doivent pas être supprimés
       $protectedRoles = ['admin', 'coach', 'entrepreneur'];

       if (in_array($role->name, $protectedRoles)) {
           return $this->customJsonResponse('Le role ' . $role->name . ' ne peut pas être supprimé', $role);
       }
       $role->delete();
       return $this->customJsonResponse('Le role a bien été supprimé', $role);
    
    }

    // modifier un role dans mon api
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->update();
        return $this->customJsonResponse('Le role a bien été modifié', $role);
    }

    // Donner des permissions aux roles dans mon api
//     public function givePermissions(Request $request, $id)
// {
//     // Valider la requête pour s'assurer que les permissions sont fournies
//     $validatedData = Validator::make($request->all(), [
//         'name' => 'required|exists:permissions,name',
//     ]);

//     if ($validatedData->fails()) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation error',
//             'data' => $validatedData->errors()
//         ], 400);
//     }

//     // Trouver le rôle par son ID
//     $role = Role::findOrFail($id);

//     // Synchroniser les permissions
//     $role->givePermissionTo($validatedData->validated()['name']);

//     // Retourner une réponse JSON personnalisée avec le rôle mis à jour
//     return response()->json([
//         'message' => 'Les permissions ont bien été attribuées',
//         'role' => $role
//     ], 200);
// }

public function givePermissions(Request $request, $roleId)
{
    // Debug: voir le contenu de la requête
    \Log::info('Request Data:', $request->all());

    // Valider la requête pour s'assurer que les permissions sont fournies
    $validatedData = Validator::make($request->all(), [
        'permissionId' => 'required|integer|exists:permissions,id',
    ]);

    if ($validatedData->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation error',
            'data' => $validatedData->errors()
        ], 400);
    }

    $permissionId = $validatedData->validated()['permissionId'];

    try {
        // Trouver le rôle par ID
        $role = Role::findOrFail($roleId);

        // Attacher la permission au rôle
        $role->permissions()->syncWithoutDetaching([$permissionId]);

        return response()->json([
            'status' => true,
            'message' => 'Permission successfully added'
        ], 200);
    } catch (\Exception $e) {
        // Log l'erreur et retourner une réponse d'erreur
        \Log::error('Error assigning permission: ' . $e->getMessage());

        return response()->json([
            'status' => false,
            'message' => 'An error occurred while assigning the permission',
            'error' => $e->getMessage()
        ], 500);
    }
}


}
