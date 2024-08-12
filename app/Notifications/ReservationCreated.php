<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Reservation;

class ReservationCreated extends Notification
{
    use Queueable;

    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Votre réservation a été acceptée')
                    ->line('Votre réservation pour l\'événement a été acceptée.')
                    ->action('Voir la réservation', url('/reservations/' . $this->reservation->id))
                    ->line('Merci d\'utiliser notre application !');
    }
}
