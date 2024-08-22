<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Mail\ReservationNotification;
use App\Mail\ReservationConfirmed;
use App\Mail\ReservationAccepted;
use App\Mail\ReservationRefuse;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ReservationRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class ReservationController extends Controller
{
    // ...
    public function reservationsEvenement($evenement_id)
    {
        $reservations = Reservation::where('evenement_id', $evenement_id)->get();
        return response()->json($reservations, 200);
    }
    public function mesReservations()
{
    $reservations = Reservation::with('evenement')
        ->where('user_id', auth()->id())
        ->get();

    return response()->json([
        'status' => true,
        'message' => "Réservations affichées avec succès",
        'data' => $reservations
    ], 200);
}
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
    
        // Send email notification to the user
        Mail::to($reservation->user->email)->send(new ReservationNotification($reservation));
    
        return response()->json([
            "status" => true,
            "message" => "Réservation ajoutée avec succès",
            "data" => $reservation
        ], 201);
    }
    


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

        // Notify the user
        Mail::to($reservation->user->email)->send(new ReservationAccepted($reservation));

        return response()->json([
            "status" => true,
            "message" => "Réservation confirmée avec succès.",
            "data" => $reservation
        ], 200);
    }

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

        // Notify the user
        Mail::to($reservation->user->email)->send(new ReservationRefuse($reservation));

        return response()->json([
            "status" => true,
            "message" => "Réservation refusée avec succès.",
            "data" => $reservation
        ], 200);
    }
}