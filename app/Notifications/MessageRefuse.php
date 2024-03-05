<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\ { Logement, Message };

class MessageRefuse extends Notification
{
    use Queueable;
    protected $message;
    protected $messageRefus;
    protected $logement;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Logement $logement, Message $message, $messageRefus)
    {
        $this->logement = $logement;
        $this->message = $message;
        $this->messageRefus = $messageRefus;
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Nous avons refusé ce message que vous avez déposé :')
                    ->line('--------------------------------------')
                    ->line($this->message->texte)
                    ->line('--------------------------------------')
                    ->line('Pour la raison suivante :')
                    ->line('--------------------------------------')
                    ->line($this->messageRefus)
                    ->line('--------------------------------------')
                    ->action('Voir ce logement', route('logements.show', $this->logement->id))
                    ->line("Merci d'utiliser notre site pour vos annonces !");
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
