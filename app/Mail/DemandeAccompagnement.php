<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class DemandeAccompagnement extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $receiver;
    public $message;
    public $senderSecteur;

    /**
     * Create a new message instance.
     *
     * @param User $sender
     * @param User $receiver
     * @param string $message
     */
    public function __construct(User $sender, User $receiver, $message)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->message = $message;

        // Récupérer le secteur d'activité de l'expéditeur
        $this->senderSecteur = $sender->secteur_activite ? $sender->secteur_activite->libelle : 'Secteur inconnu';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('demande_accompagnement')
                    ->subject('Demande d\'Accompagnement')
                    ->with([
                        'senderName' => $this->sender->name,
                        'receiverName' => $this->receiver->name,
                        'message' => $this->message,
                        'senderSecteur' => $this->senderSecteur,
                    ]);
    }
}
