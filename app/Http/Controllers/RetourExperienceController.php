<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RetourExperience;
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
        return response()->json($RetourExperience);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // Ajout d'un retour d'expérience
        $retourExperience = RetourExperience::create($request->all());
        return response()->json($retourExperience);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        // afficher un retour d'expérience spécifique
        $retourExperience = RetourExperience::find($id);
        if (!$retourExperience) {
            return response()->json(['message' => 'reretourExperience non trouvé'], 404);
        }

        return response()->json($retourExperience);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $retourExperience = RetourExperience::findOrFail($id);
    $retourExperience->update($request->all());

    return response()->json($retourExperience);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RetourExperience $retourExperience)
    {
        // Supprimer un retour d'expérience
        $retourExperience->delete();
        return response()->json(['message' => 'Retour d\'expérience supprimé']);
    }

    public function restore($id){
        // Restaurer un retour d'expérience
        $retourExperience = RetourExperience::withTrashed()->find($id);
        if (!$retourExperience) {
            return response()->json(['message' => 'Retour d\'expérience non trouvé'], 404);
        }

        $retourExperience->restore();
        return response()->json($retourExperience);
    }
}
