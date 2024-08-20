<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreRessourceRequest;
use App\Http\Requests\UpdateRessourceRequest;


class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ressource = Ressource::all();
       return response($ressource,200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRessourceRequest $request)
    {
        // Vérifier si l'utilisateur a un statut de 0
        if (auth()->user()->statut === 0) {
            // Retourner une réponse JSON avec un message d'erreur
            return $this->customJsonResponse("Vous n'êtes pas autorisé à ajouter une ressource.", null, 403);
        }
    
        // Créer une nouvelle instance du modèle Ressource
        $ressource = new Ressource();
    
        // Remplir le modèle avec les données validées de la requête
        $ressource->fill($request->validated());
    
        // Gérer le téléchargement du fichier d'image
        if ($request->hasFile('image')) {
            $ressource->image = $request->file('image')->store('public/photos');
        }
    
        // Gérer le téléchargement du fichier contenu
        if ($request->hasFile('contenu')) {
            $ressource->contenu = $request->file('contenu')->store('public/contenu');
        }
    
        // Assigner l'ID de l'utilisateur authentifié au champ user_id
        $ressource->user_id = auth()->id();
    
        // Enregistrer la Ressource dans la base de données
        $ressource->save();
    
        // Retourner une réponse JSON personnalisée
        return $this->customJsonResponse("Ressource ajoutée avec succès", $ressource, 201);
    }
    



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ressource = Ressource::find($id);
        if (!$ressource) {
            return response()->json(['message'=>'ressource non trouvée'],404);
        }
        return response()->json($ressource,200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRessourceRequest $request, $id)
    {
        // Vérifier si l'utilisateur a un statut de 0
        if (auth()->user()->statut === 0) {
            // Retourner une réponse JSON avec un message d'erreur
            return $this->customJsonResponse("Vous n'êtes pas autorisé à mettre à jour une ressource.", null, 403);
        }
    
        // Récupérer la ressource à mettre à jour
        $ressource = Ressource::findOrFail($id);
    
        // Remplir le modèle avec les données validées de la requête
        $ressource->fill($request->validated());
    
        // Gérer la mise à jour du fichier image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if (File::exists(public_path($ressource->image))) {
                File::delete(public_path($ressource->image));
            }
            // Enregistrer la nouvelle image
            $ressource->image = $request->file('image')->store('public/photos');
        }
    
        // Gérer la mise à jour du fichier contenu
        if ($request->hasFile('contenu')) {
            // Supprimer l'ancien contenu si il existe
            if (File::exists(public_path($ressource->contenu))) {
                File::delete(public_path($ressource->contenu));
            }
            // Enregistrer le nouveau contenu
            $ressource->contenu = $request->file('contenu')->store('public/contenu');
        }
    
        // Enregistrer les modifications dans la base de données
        $ressource->save();
    
        // Retourner une réponse JSON personnalisée
        return $this->customJsonResponse("Ressource mise à jour avec succès", $ressource, 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Récupérer la ressource à supprimer
    $ressource = Ressource::find($id);

    // Vérifier si la ressource existe
    if (!$ressource) {
        return response()->json(['message' => 'Ressource non trouvée'], 404);
    }

    // Vérifier si l'utilisateur a le droit de supprimer cette ressource
    if ($ressource->user_id !== auth()->id()) {
        return response()->json(['message' => 'Vous n\'êtes pas autorisé à supprimer cette ressource'], 403);
    }

    // Supprimer la ressource
    $ressource->delete();

    // Retourner une réponse JSON confirmant la suppression
    return response()->json(['message' => 'Ressource supprimée avec succès'], 200);
}

public function restore($id)
{
    // Vérifier le statut de l'utilisateur
    if (auth()->user()->statut == 0) {
        return response()->json(['message' => 'Vous n\'êtes pas autorisé à restaurer des ressources'], 403);
    }

    // Récupérer la ressource supprimée qui correspond à l'utilisateur
    $ressource = Ressource::onlyTrashed()->where('id', $id)->where('user_id', auth()->id())->first();

    // Vérifier si la ressource existe et appartient à l'utilisateur
    if (!$ressource) {
        return response()->json(['message' => 'Ressource non trouvée ou non autorisée'], 404);
    }

    // Restaurer la ressource
    $ressource->restore();

    // Retourner une réponse JSON confirmant la restauration
    return $this->customJsonResponse("Ressource restaurée avec succès", $ressource);
}

    
public function forceDelete($id)
{
    // Vérifier le statut de l'utilisateur
    if (auth()->user()->statut == 0) {
        return response()->json(['message' => 'Vous n\'êtes pas autorisé à supprimer définitivement des ressources'], 403);
    }

    // Récupérer la ressource supprimée qui correspond à l'utilisateur
    $ressource = Ressource::onlyTrashed()->where('id', $id)->where('user_id', auth()->id())->first();

    // Vérifier si la ressource existe et appartient à l'utilisateur
    if (!$ressource) {
        return response()->json(['message' => 'Ressource non trouvée ou non autorisée'], 404);
    }

    // Supprimer définitivement la ressource
    $ressource->forceDelete();

    // Retourner une réponse JSON confirmant la suppression définitive
    return $this->customJsonResponse("Ressource supprimée définitivement", null, 200);
}

public function trashed()
{
    // Vérifier le statut de l'utilisateur
    if (auth()->user()->statut == 0) {
        return response()->json(['message' => 'Vous n\'êtes pas autorisé à voir les ressources archivées'], 403);
    }

    // Récupérer les ressources archivées appartenant à l'utilisateur authentifié
    $ressources = Ressource::onlyTrashed()->where('user_id', auth()->id())->get();

    // Retourner une réponse JSON avec les ressources archivées
    return $this->customJsonResponse("Ressources archivées", $ressources);
}


    // Afficher les ressources par catégories
    public function indexByCategory($id)
    {

        // Récupérer les ressources par catégories
        $ressources = Ressource::where('categorie_id', $id)->get();

        // Retourner une réponse JSON avec les ressources par catégories
        return $this->customJsonResponse("Ressources par catégories", $ressources);
    }

}
