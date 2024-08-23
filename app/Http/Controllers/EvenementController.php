<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;
use App\Models\Evenement;
use Illuminate\Support\Facades\File;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenement = Evenement::all();
        return $this->customJsonResponse("Liste des evenements", $evenement, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvenementRequest $request)
    {
        $evenement = new Evenement();
        $evenement->fill($request->validated());
        // if ($request->hasFile('image')) {
        //     $evenement->image = $request->file('image')->store('public/photos');
        // }

        // if ($request->hasFile('image')) {
        //     // Stocker l'image et enregistrer le chemin d'accès
        //     $imagePath = $request->file('image')->store('public/photos');
        //     $retourExperience->image = str_replace('public/', '', $imagePath);
        // }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/photos');
            $evenement->image = str_replace('public/', '', $imagePath);
        }
    
        $evenement->save();
        return $this->customJsonResponse("Evenement ajouté avec succès", $evenement, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return response()->json(['message' => 'Evenement non trouvé'], 404);
        }
        return $this->customJsonResponse("Evenement", $evenement, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvenementRequest $request, $id)
    {
        $evenement = Evenement::findOrfail($id);
        $evenement->fill($request->validated());
        if ($request->hasFile('image')) {
            if (File::exists(public_path($evenement->image))) {
                File::delete(public_path($evenement->image));
            }
            // $evenement->image = $request->file('image')->store('public/photos');
            // if ($request->hasFile('image')) {
            //     // Stocker l'image et enregistrer le chemin d'accès
            //     $imagePath = $request->file('image')->store('public/photos');
            //     $retourExperience->image = str_replace('public/', '', $imagePath);
            // }

            $imagePath = $request->file('image')->store('public/photos');
            $evenement->image = str_replace('public/', '', $imagePath);
        }
        $evenement->update();
        return $this->customJsonResponse("Evenement mis à jour avec succès", $evenement, 200);
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy($id)
    {
       $evenement = Evenement::findOrfail($id);
       $evenement->delete();
       return $this->customJsonResponse("Evenement supprimé avec succès", $evenement, 200);
    }

    /**
     * Restore a trashed resource.
     */
    public function restore($id)
    {
        $evenement = Evenement::withTrashed()->findOrFail($id);
        if ($evenement->trashed()) {
            $evenement->restore();
            return $this->customJsonResponse("Evenement restauré avec succès", $evenement, 200);
        }

        return response()->json(['message' => 'Cet evenement n\'est pas supprimé'], 400);
    }

    /**
     * Permanently delete a resource (force delete).
     */
    public function forceDelete($id)
    {
        $evenement = Evenement::onlyTrashed()->findOrFail($id);
        $evenement->forceDelete();
        return $this->customJsonResponse("Evenement supprimé definitivement", $evenement, 200);
    }
    /**
     * Display a listing of the trashed resources.
     */
    // Afficher la liste des evenements supprimés
    public function trash()
    {
        $trashed = Evenement::onlyTrashed()->get();
        return $this->customJsonResponse("Liste des evenements supprimés", $trashed, 200);
    }

    // Récupérer le nombre d'événement
    public function nombreEvenements()
    {
        $evenements = Evenement::count();
        return response()->json(['evenements' => $evenements], 200);
    }

    // Récupérer le nombre d'événement à venir
    public function nombreEvenementsAvenir()
    {
        $evenements = Evenement::where('date_fin', '>', now())->count();
        return response()->json(['evenements' => $evenements], 200);
    }
}
