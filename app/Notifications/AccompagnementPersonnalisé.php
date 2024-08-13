<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccompagnementPersonnalisé extends Notification
{
    use Queueable;

    protected $senderId;
    protected $message;

    public function __construct($senderId, $message)
    {
        $this->senderId = $senderId;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail']; // Vous pouvez ajouter d'autres canaux si nécessaire
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle Demande d\'Accompagnement')
            ->line('Vous avez reçu une nouvelle demande d\'accompagnement.')
            ->line("Message : {$this->message}")
            ->line('Pour toute réponse ou question, veuillez répondre directement à cet e-mail.')
            ->line('Merci de votre attention !');
    }
}
