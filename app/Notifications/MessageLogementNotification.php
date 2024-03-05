<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MessageLogementNotification extends Notification
{
    use Queueable;

    protected $logement;
    protected $message;
    protected $email;  

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($logement, $message, $email)
    {
        $this->logement = $logement;
        $this->message = $message;
        $this->email = $email;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Vous avez reçu un message concernant un logement que vous avez déposé: ')
                    ->line('--------------------------------------')
                    ->line($this->message)
                    ->line('--------------------------------------')
                    ->action('Voir votre logement', route('logements.show', $this->logement->id))
                    ->line("L'email de l'expéditeur est : " . $this->email)
                    ->line("Merci d'utiliser notre site pour poster vos logements !");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
