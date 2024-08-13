<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\DemandeAccompagnement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\AccompagnementPersonnalise;
use App\Notifications\AccompagnementPersonnalisé;
use Illuminate\Support\Facades\Notification;

class AccompagnementPersonnaliseController extends Controller
{

    public function demanderAccompagnementPersonnalise(Request $request, $receiverId)
{
    $senderId = Auth::id();
    $message = $request->input('message');

    AccompagnementPersonnalise::create([
        'sender_id' => $senderId,
        'receiver_id' => $receiverId,
        'message' => $message,
    ]);

    $receiver = User::find($receiverId);
    $sender = User::find($senderId);

    Mail::to($receiver->email)->send(new DemandeAccompagnement($sender, $receiver, $message));

    return response()->json(['message' => 'Demande d\'accompagnement envoyée']);
}

}
