<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGuideRequest;
use App\Http\Requests\UpdateGuideRequest;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guide = Guide::all();
        return $this->customJsonResponse("Liste des guides", $guide, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'etape_id' => 'required|exists:etapes,id',
        ]);

        $guide = Guide::create([
            "titre" => $validated["titre"],
            "contenu" => $validated["contenu"],
            "etape_id" => $validated["etape_id"],
            "user_id" => Auth::id(),
        ]);

        return $this->customJsonResponse("guide ajouté avec succès", $guide, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guide = Guide::findOrFail($id);

        if (!$guide) {

            return response()->json(['message'=>'guide non trouvé'],404);
        }
        
        return $this->customJsonResponse("guide", $guide, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guide = Guide::findOrFail($id);

        $validated = $request->validate([

            'titre' => 'sometimes|string|max:255',
            'contenu' => 'sometimes|string',
            'etape_id' => 'sometimes|exists:etapes,id',
        ]);


        $guide->update($validated);
        if (!$guide) {

            return response()->json(['message'=>'guide non trouvé'],404);
        }
        return $this->customJsonResponse("guide mis à jour avec succès", $guide, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guide = Guide::findOrFail($id);

        $guide->delete();

        if (!$guide) {

            return response()->json(['message'=>'guide non trouvé'],404);
        }

        return $this->customJsonResponse("guide supprimé avec succès", $guide, 200);
    }
}
