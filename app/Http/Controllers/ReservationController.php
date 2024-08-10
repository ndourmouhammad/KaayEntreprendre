<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $reservations= Reservation::where('user_id', auth::id())->get();
      
        return response()->json([
            'status' => true,
            'message' => "Réservations affichées avec succès",
            "data" => $reservations
        ], 200);
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
        $validatedData = Validator::make($request->all(), [
            'evenement_id' => 'required|exists:evenements,id',
            'status' => 'nullable|in:en_attente,accepte,refuse',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation error",
                "data" => $validatedData->errors()
            ], 400);
        }

        $validated = $validatedData->validated();
        $validated['user_id'] = auth::id();

        $reservation = Reservation::create($validated);

        return response()->json([
            "status" => true,
            "message" => "Réservation ajoutée avec succès",
            "data" => $reservation
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        $this->authorize('view', $reservation);
        return response()->json($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'evenement_id' => 'required|exists:evenements,id',
            'status' => 'nullable|in:en_attente,accepte,refuse',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation error",
                "data" => $validatedData->errors()
            ], 400);
        }

        $reservation = Reservation::findOrFail($id);
        $this->authorize('update', $reservation);

        $reservation->update($validatedData->validated());

        return response()->json([
            "status" => true,
            "message" => "Réservation mise à jour avec succès",
            "data" => $reservation
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $this->authorize('delete', $reservation);

        $reservation->delete();

        return response()->json([
            'status' => true,
            'message' => 'Réservation supprimée avec succès'
        ], 204);
    }
}
