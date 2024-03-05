<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Logement;

class LogementApprove extends Notification
{
    use Queueable;

    protected $logement;  

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Logement $logement)
    {
        $this->logement = $logement;
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
                    ->line('Nous avons approuvé une annonce que vous avez déposée :')
                    ->action('Voir votre annonce', route('logements.show', $this->logement->id))
                    ->line("Merci d'utiliser notre site pour vos annonces !");

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
