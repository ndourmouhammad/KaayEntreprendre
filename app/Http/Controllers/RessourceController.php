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
    // Create a new instance of the Ressource model
    $ressource = new Ressource();

    // Fill the model with the validated data from the request
    $ressource->fill($request->validated());

    // Handle the image file upload
    if ($request->hasFile('image')) {
        $ressource->image = $request->file('image')->store('public/photos');
    }

    // Handle the contenu file upload
    if ($request->hasFile('contenu')) {
        $ressource->contenu = $request->file('contenu')->store('public/contenu');
    }

    // Assign the authenticated user's ID to the user_id field
    $ressource->user_id = auth()->id();

    // Save the Ressource to the database
    $ressource->save();

    // Return a custom JSON response
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

        $ressource = Ressource::findOrfail($id);
        $ressource->fill($request->validated());
        if ($request->hasFile('image')) {
            if (File::exists(public_path($ressource->image))) {
                File::delete(public_path($ressource->image));
            }
            $ressource->image = $request->file('image')->store('public/photos');
        }
        if ($request->hasFile('contenu')) {
            if (File::exists(public_path($ressource->contenu))) {
                File::delete(public_path($ressource->contenu));
            }
            $ressource->contenu = $request->file('contenu')->store('public/contenu');
        }
        $ressource->update();
        return $this->customJsonResponse("Ressource mis à jour avec succès", $ressource, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $ressource = Ressource::find($id);
        if (!$ressource) {
            return response()->json(['message'=> 'ressource non trouvée'],404);
        }
        $ressource->delete();
        return response()->json($ressource,200);
    }

    public function restore($id)
    {
        $ressource = Ressource::onlyTrashed()->where('id', $id)->first();
        $ressource->restore();
        return $this->customJsonResponse("ressource restauré avec succès", $ressource);
    }
    public function forceDelete($id)
    {
        $ressource = Ressource::onlyTrashed()->where('id', $id)->first();
        $ressource->forceDelete();
        return $this->customJsonResponse("ressource supprimé définitivement", null, 200);
    }
    public function trashed()
    {
        $ressources = Ressource::onlyTrashed()->get();
        return $this->customJsonResponse("ressources archivés", $ressources);
    }
}
