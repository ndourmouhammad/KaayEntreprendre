<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvenementRequest;
use App\Http\Requests\UpdateEvenementRequest;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenement = Evenement::all();
        return response()->json($evenement);
    }


    
    public function store(StoreEvenementRequest $request)
    {
        $evenement = Evenement::create($request->all());
        return response()->json($evenement,201);
        
    }

    public function show($id)
    {
        //afficher un event
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return response()->json(['message' => 'Evenement non trouvé'], 404);
        }
        return response()->json($evenement);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $evenement = Evenement::findOrfail($id);
        $evenement->update($request->all());
        return response()->json($evenement);
    }

 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return response()->json(['message' => 'Evenement supprimé']);
    }
}
