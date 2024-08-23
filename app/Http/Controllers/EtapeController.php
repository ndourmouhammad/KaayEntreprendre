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
        if ($request->hasFile('pieces_jointes')) {
            $etape->pieces_jointes = $request->file('pieces_jointes')->store('public/pieces_jointes');
        }
    
        // Save the resource to the database
        $etape->save();
    
        // Return a custom JSON response
        return $this->customJsonResponse("Ressource ajoutée avec succès", $etape, 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Etape $etape, $id)
{
    $etape = Etape::findOrFail($id);
    return response()->json([
        'status' => true, // Correction ici
        'message' => 'Etape récupérée avec succès',
        'data' => $etape
    ], 200);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etape $etape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtapeRequest $request, Etape $etape)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etape $etape)
    {
        //
    }
}
