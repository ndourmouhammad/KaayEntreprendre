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

    // public function index()
    // {
    //     $reservations = Reservation::all();
    //     return response()->json($reservations, 200);
    // }

    // methode pour voir les réservation d'un evenement
    public function reservationsEvenement($evenement_id)
    {
        $reservations = Reservation::where('evenement_id', $evenement_id)->get();
        return response()->json($reservations, 200);
    }

    public function mesReservations()
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
    public function reserver(Request $request, $evenement_id)
    {
        // Validate the request
        $validatedData = Validator::make($request->all(), [
            'status' => 'nullable|in:en_attente,accepte,refuse',
        ]);
    
        if ($validatedData->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation error",
                "data" => $validatedData->errors()
            ], 400);
        }
    
        // Retrieve validated status or set default
        $validated = $validatedData->validated();
        $validated['status'] = $validated['status'] ?? 'en_attente';
    
        // Prepare data for creation
        $data = [
            'evenement_id' => $evenement_id,
            'user_id' => auth::id(),
            'status' => $validated['status'],
        ];
    
        // Create the reservation
        $reservation = Reservation::create($data);
    
        return response()->json([
            "status" => true,
            "message" => "Réservation ajoutée avec succès",
            "data" => $reservation
        ], 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $reservation = Reservation::findOrFail($id);
    //     $this->authorize('view', $reservation);
    //     return response()->json($reservation);
    // }

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
    // public function update(Request $request, $id)
    // {
    //     $validatedData = Validator::make($request->all(), [
    //         'evenement_id' => 'required|exists:evenements,id',
    //         'status' => 'nullable|in:en_attente,accepte,refuse',
    //     ]);

    //     if ($validatedData->fails()) {
    //         return response()->json([
    //             "status" => false,
    //             "message" => "Validation error",
    //             "data" => $validatedData->errors()
    //         ], 400);
    //     }

    //     $reservation = Reservation::findOrFail($id);

    //     $reservation->update($validatedData->validated());

    //     return response()->json([
    //         "status" => true,
    //         "message" => "Réservation mise à jour avec succès",
    //         "data" => $reservation
    //     ], 200);
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $reservation = Reservation::findOrFail($id);
        

    //     $reservation->delete();

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Réservation supprimée avec succès'
    //     ], 204);
    // }

// confirmer une reservation
    public function confirmerReservation($reservation_id)
{
    // Find the reservation by its ID
    $reservation = Reservation::findOrFail($reservation_id);

    // Check if the reservation status is 'en_attente'
    if ($reservation->status !== 'en_attente') {
        return response()->json([
            "status" => false,
            "message" => "La réservation ne peut être confirmée car elle n'est pas en attente."
        ], 400);
    }

    // Update the status to 'accepte'
    $reservation->status = 'accepte';
    $reservation->save();

    return response()->json([
        "status" => true,
        "message" => "Réservation confirmée avec succès.",
        "data" => $reservation
    ], 200);
}

// refuser une reservation
public function refuserReservation($reservation_id)
{
    // Find the reservation by its ID
    $reservation = Reservation::findOrFail($reservation_id);

    // Check if the reservation status is 'en_attente'
    if ($reservation->status !== 'en_attente') {
        return response()->json([
            "status" => false,
            "message" => "La réservation ne peut être refusée car elle n'est pas en attente."
        ], 400);
    }

    // Update the status to 'refuse'
    $reservation->status = 'refuse';
    $reservation->save();

    return response()->json([
        "status" => true,
        "message" => "Réservation refusée avec succès.",
        "data" => $reservation
    ], 200);
}

}
