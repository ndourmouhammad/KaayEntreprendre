<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDiscussionNotification extends Notification
{
    use Queueable;
    protected $discussion;

    /**
     * Create a new notification instance.
     */
    public function __construct($discussion)
    {
        //
        $this->discussion = $discussion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->line('Une nouvelle discussion a été ajoutée.')
        ->action('Voir la discussion', url('/discussions/'.$this->discussion->id))
        ->line('Merci d\'utiliser notre application!');
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
