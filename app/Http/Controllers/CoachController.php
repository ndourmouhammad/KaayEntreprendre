<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $coaches = User::with('secteurActivite')->get();
        return response()->json($coaches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Récupère le coach par ID
        $coach = User::find($id);

        // Vérifie si le coach existe
        if (!$coach) {
            return response()->json(['message' => 'Coach not found'], 404);
        }

        // Retourne les détails du coach
        return response()->json($coach);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getCoachesBySecteur(int $id): JsonResponse
    {
        $coaches = User::where('secteur_activite_id', $id)
                       ->with('secteurActivite')
                       ->get();
        return response()->json($coaches);
    }
}
