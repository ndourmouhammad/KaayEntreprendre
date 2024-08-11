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


    
    public function store(StoreEvenementRequest $request)
    {
        $evenement = new Evenement();
        $evenement->fill($request->validated());
        if ($request->hasFile('photo')) {
            $evenement->photo = $request->file('photo')->store('public/photos');
        }
        $evenement->save();
        return $this->customJsonResponse("Evenement ajouté avec succès", $evenement, 201);
        
    }

    public function show($id)
    {
        //afficher un event
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return response()->json(['message' => 'Evenement non trouvé'], 404);
        }
        return $this->customJsonResponse("Evenement", $evenement, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvenementRequest $request ,$id)
    {
        $evenement = Evenement::findOrfail($id);
        $evenement->fill($request->validated());
        if ($request->hasFile('image')) {
            if (File::exists(public_path($evenement->image))) {
                File::delete(public_path($evenement->image));
            }
            $evenement->image = $request->file('image')->store('public/photos');
        }
        $evenement->update();
        return $this->customJsonResponse("Evenement mis à jour avec succès", $evenement, 200);
    }

 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $evenement = Evenement::findOrfail($id);
       $evenement->delete();
       return $this->customJsonResponse("Etudiant supprimé avec succès", $evenement, 200);
    }
}
