<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRessourceRequest;
use App\Http\Requests\UpdateRessourceRequest;
use App\Models\Ressource;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Ressource::all();


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRessourceRequest $request)
    {
        $request->validate([

            'titre' =>'required|string|max:255',
            'contenu' => 'required|varchar|max:255',
            'description'=> 'required|text',
            'image' =>'required|string|',
            'categorie_id'=>'required',
            'user_id' => 'required'
        ]);
       return Ressource::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Ressource $ressource)
    {


        if (!$ressource) {

            return response()->json(['message'=>'ressource non trouvée'],404);
        }

        return $ressource;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRessourceRequest $request, Ressource $ressource)
    {
        $request->validate([

            'titre' =>'required|string|max:255',
            'contenu' => 'required|varchar|max:255',
            'description'=> 'required|text',
            'image' =>'required|string|',
            'categorie_id'=>'required',
            'user_id' => 'required'
        ]);

        $ressource->update($request->all());

        if (!$ressource) {
            return response()->json(['message'=>'ressource non trouvée'],404);
        }

        return response()->json($ressource,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {

        $ressource->delete();

        if (!$ressource) {
            return response()->json(['message'=> 'ressource non trouvée'],404);
        }

        return $ressource;
    }
}
