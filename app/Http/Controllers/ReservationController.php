<?php
namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationRefuse;
use App\Mail\ReservationAccepted;
use App\Mail\ReservationConfirmed;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationNotification;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ReservationRejected;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    // ...
    public function reservationsEvenement($evenement_id)
{
    $reservations = Reservation::where('evenement_id', $evenement_id)
                                ->whereIn('status', ['accepte', 'en_attente']) // Filtrer par statut
                                ->with('user:id,name,email,telephone') // Inclure seulement l'id et le nom de l'utilisateur
                                ->get();

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
    // Vérifier si l'utilisateur a déjà réservé pour cet événement
    $existingReservation = Reservation::where('evenement_id', $evenement_id)
                                       ->where('user_id', auth()->id())
                                       ->first();

    if ($existingReservation) {
        return response()->json([
            "status" => false,
            "message" => "Vous avez déjà réservé pour cet événement.",
        ], 400);
    }

    // Récupérer l'événement pour vérifier le nombre de places disponibles
    $evenement = Evenement::find($evenement_id);

    if (!$evenement) {
        return response()->json([
            "status" => false,
            "message" => "Événement non trouvé.",
        ], 404);
    }

    // Vérifier s'il y a des places disponibles
    if ($evenement->nombre_places <= 0) {
        return response()->json([
            "status" => false,
            "message" => "Aucune place disponible pour cet événement.",
        ], 400);
    }

    // Valider la requête
    $validatedData = Validator::make($request->all(), [
        'status' => 'nullable|in:en_attente,accepte,refuse',
    ]);

    if ($validatedData->fails()) {
        return response()->json([
            "status" => false,
            "message" => "Erreur de validation",
            "data" => $validatedData->errors()
        ], 400);
    }

    // Récupérer le statut validé ou définir une valeur par défaut
    $validated = $validatedData->validated();
    $validated['status'] = $validated['status'] ?? 'en_attente';

    // Préparer les données pour la création
    $data = [
        'evenement_id' => $evenement_id,
        'user_id' => auth::id(),
        'status' => $validated['status'],
    ];

    // Créer la réservation
    $reservation = Reservation::create($data);

    // Déduire le nombre de places disponibles
    $evenement->nombre_places -= 1;
    $evenement->save();

    // Envoyer une notification par email à l'utilisateur
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

    public function checkUserReservation($evenement_id)
{
    // Vérifier si l'utilisateur a déjà réservé pour cet événement
    $existingReservation = Reservation::where('evenement_id', $evenement_id)
                                       ->where('user_id', auth()->id())
                                       ->exists();

    return response()->json([
        "status" => true,
        "message" => "Vérification de la réservation effectuée.",
        "hasReserved" => $existingReservation
    ], 200);
}

}