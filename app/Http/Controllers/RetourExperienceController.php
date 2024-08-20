<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RetourExperience;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreRetourExperienceRequest;
use App\Http\Requests\UpdateRetourExperienceRequest;

class RetourExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Liste des retours d'expériences
        $retourExperiences = RetourExperience::all();
        return $this->customJsonResponse("Liste des retours d'experiences", $retourExperiences);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRetourExperienceRequest $request)
    {
        // Créer une nouvelle instance de RetourExperience
        $retourExperience = new RetourExperience();
    
        // Remplir le modèle avec les données validées
        $retourExperience->fill($request->validated());
    
        // Ajouter le user_id de l'utilisateur connecté
        $retourExperience->user_id = auth()->id();
    
        // Vérifier si une image a été téléchargée
        if ($request->hasFile('image')) {
            // Stocker l'image et enregistrer le chemin d'accès
            $imagePath = $request->file('image')->store('public/photos');
            $retourExperience->image = str_replace('public/', '', $imagePath);
        }
    
        // Sauvegarder le modèle dans la base de données
        $retourExperience->save();
    
        // Retourner une réponse JSON personnalisée
        return response()->json([
            'message' => "Retour d'expérience ajouté avec succès",
            'data' => $retourExperience
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Afficher un retour d'expérience spécifique
        $retourExperience = RetourExperience::find($id);
        if (!$retourExperience) {
            return $this->customJsonResponse('Retour d\'experience non trouvé', null, 404);
        }

        return $this->customJsonResponse("Retour d'experience", $retourExperience, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRetourExperienceRequest $request, $id)
    {
        // Mettre à jour un retour d'expérience spécifique
        $retourExperience = RetourExperience::findOrFail($id);
        $retourExperience->fill($request->validated());

        // Gérer l'image si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if (File::exists(public_path($retourExperience->image))) {
                File::delete(public_path($retourExperience->image));
            }
            // Stocker la nouvelle image
            // $retourExperience->image = $request->file('image') ? $request->file('image')->store('public/photos') : null;
            $retourExperience->image = $request->file('image') ? str_replace('public/', '', $request->file('image')->store('public/photos')) : $retourExperience->image;
            
        }

        // Sauvegarder les changements
        $retourExperience->update();
        return $this->customJsonResponse('Retour d\'experience mis à jour avec succès', $retourExperience, 200);
    }

    /**
     * Remove the specified resource from storage (Soft Delete).
     */
    public function destroy($id)
    {
        // Supprimer (soft delete) un retour d'expérience spécifique
        $retourExperience = RetourExperience::findOrFail($id);
        $retourExperience->delete();
        return $this->customJsonResponse('Retour d\'experience supprimé avec succès', $retourExperience, 200);
    }

    /**
     * Display a listing of the trashed resources.
     */
    public function trash()
    {
        // Liste des retours d'expériences supprimés (soft deleted)
        $trashed = RetourExperience::onlyTrashed()->get();
        return $this->customJsonResponse("Liste des retours d'experiences supprimés", $trashed, 200);
    }

    /**
     * Restore a soft deleted resource.
     */
    public function restore($id)
    {
        // Restaurer un retour d'expérience soft deleted
        $retourExperience = RetourExperience::onlyTrashed()->findOrFail($id);
        $retourExperience->restore();
        return $this->customJsonResponse('Retour d\'experience restauré avec succès', $retourExperience, 200);
    }

    /**
     * Force delete a soft deleted resource.
     */
    public function forceDelete($id)
    {
        // Supprimer définitivement un retour d'expérience soft deleted
        $retourExperience = RetourExperience::onlyTrashed()->findOrFail($id);
        $retourExperience->forceDelete();
        return $this->customJsonResponse('Retour d\'experience supprimé définitivement', $retourExperience, 200);
    }
}
