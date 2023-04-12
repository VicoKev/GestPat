<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
     {
         $this->token = $token;
     }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */

     protected $token;

     
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('password/reset', $this->token);

    return (new MailMessage)
        ->subject('Réinitialisation de votre mot de passe')
        ->line('Vous recevez cet e-mail parce que nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.')
        ->action('Réinitialiser le mot de passe', url($url))
        ->line('Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.')
        ->line('Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune autre action n\'est requise.')
        ->line("Merci d'utiliser notre application !");
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
