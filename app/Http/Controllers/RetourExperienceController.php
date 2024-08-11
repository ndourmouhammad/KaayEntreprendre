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
        //liste des retours d'exeperiences
        $RetourExperience = RetourExperience::all();
        return $this->customJsonResponse("Liste des retours d'experiences", $RetourExperience);
    }

    /**
     * Show the form for creating a new resource.
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
            $retourExperience->image = $request->file('image')->store('public/photos');
        }

        // Sauvegarder le modèle dans la base de données
        $retourExperience->save();

        // Retourner une réponse JSON personnalisée
        return $this->customJsonResponse("Retour d'experience ajouté avec succès", $retourExperience, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // afficher un retour d'expérience spécifique
        $retourExperience = RetourExperience::find($id);
        if (!$retourExperience) {
            return $this->customJsonResponse('Retour d\'experience non trouvé', null, 404);
        }

        return $this->customJsonResponse("Retour d'experience", $retourExperience, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRetourExperienceRequest $request, $id) {

        $retourExperience = RetourExperience::findOrFail($id);
        $retourExperience->fill($request->validated());
        if ($request->hasFile('image')) {
            if (File::exists(public_path($retourExperience->image))) {
                File::delete(public_path($retourExperience->image));
            }
            $retourExperience->image = $request->file('image')->store('public/photos');
        }
        $retourExperience->update();
        return $this->customJsonResponse('Retour d\'experience mis à jour', $retourExperience, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $retourExperience = RetourExperience::findOrFail($id);
        $retourExperience->delete();
        return $this->customJsonResponse('Retour d\'experience supprimé', $retourExperience, 200);
    }
}
