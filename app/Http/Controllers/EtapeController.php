<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEtapeRequest;
use App\Http\Requests\UpdateEtapeRequest;

class EtapeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Etapes = Etape::all();
       return response()->json([
           'atatus'=>true,
           'message'=>'Etape récupérés avec succés',
           'data'=>$Etapes
       ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new Etape instance
        $etape = new Etape();
    
        // Fill the Etape model with all the request data
        $etape->fill($request->all());
    
        // Handle file upload if present
        // if ($request->hasFile('pieces_jointes')) {
        //     $etape->pieces_jointes = $request->file('pieces_jointes')->store('public/pieces_jointes');
        // }
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/photos');
        //     $evenement->image = str_replace('public/', '', $imagePath);
        // }

        if ($request->hasFile('pieces_jointes')) {
            $imagePath = $request->file('pieces_jointes')->store('public/pieces_jointes');
            $etape->pieces_jointes = str_replace('public/', '', $imagePath);
        }

        // Add the guide_id foriegn key
        $etape->guide_id = $request->guide_id;
    
        // Save the resource to the database
        $etape->save();
    
        // Return a custom JSON response
        return $this->customJsonResponse("Ressource ajoutée avec succès", $etape, 201);
    }
    
    

    // Fonctionnalité pour mettre à jour une étape et enregistrer les modifications dans la base de données
    public function update(Request $request, $id)
{
    // Find the existing Etape by ID
    $etape = Etape::find($id);
    if (!$etape) {
        return response()->json(['message' => 'Etape non trouvée'], 404);
    }

    // Validate the request data
    $request->validate([
        'libelle' => 'required|string',
        'pieces_jointes' => 'nullable|file'
    ]);

    // Update only the fields that are allowed
    $etape->fill($request->except('id'));

    // Handle the file upload if provided
    // if ($request->hasFile('pieces_jointes')) {
    //     $etape->pieces_jointes = $request->file('pieces_jointes')->store('public/pieces_jointes');
    // }

    if ($request->hasFile('pieces_jointes')) {
        $imagePath = $request->file('pieces_jointes')->store('public/pieces_jointes');
        $etape->pieces_jointes = str_replace('public/', '', $imagePath);
    }

    // Save the updated model
    $etape->save();

    return response()->json(['message' => 'Etape mise à jour avec succès'], 200);
}

    




    // Fonctionnalité pour supprimer une étape
    public function delete($id)
    {
        $etape = Etape::find($id);
        if (!$etape) {
            return response()->json(['message' => 'Etape non trouvée'], 404);
        }
        $etape->delete();
        return response()->json(['message' => 'Etape supprimée avec succès'], 200);
    }
}
