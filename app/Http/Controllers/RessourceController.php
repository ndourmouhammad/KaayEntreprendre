<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRessourceRequest;
use App\Http\Requests\UpdateRessourceRequest;
use App\Models\Ressource;
use Illuminate\Http\Request;


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
    public function store(Request $request)
    {
        // Add the user_id of the currently authenticated user to the request data
        $request['user_id'] = 1; // TODO: Replace with authenticated user id;
    
        // Create the resource using the request data
        $ressource = Ressource::create($request->all());
    
        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Ressource created successfully',
            'data' => $ressource
        ], 201); // 201 status code for resource creation
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
    public function update(Request $request, $id)
    {
        $ressource = Ressource::find($id);
        if (!$ressource) {
            return response()->json(['message'=> 'ressource non trouvée'],404);
        }
        $ressource->update($request->all());
        return response()->json($ressource,200);
        
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
}
