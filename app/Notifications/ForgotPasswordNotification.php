<?php
/* De klasse `ForgotPasswordNotification` is een PHP-klasse die een e-mailmelding voor het opnieuw
instellen van het wachtwoord naar een gebruiker verzendt. */
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * De functie genereert een e-mail voor het opnieuw instellen van het wachtwoord met een link voor
     * het opnieuw instellen van het wachtwoord voor de gebruiker.
     * 
     * param notifiable De parameter '' is een instantie van het gebruikersmodel of een
     * ander model dat de interface 'Illuminate\Contracts\Notifications\Notifiable' implementeert. Het
     * vertegenwoordigt de ontvanger van de e-mailmelding. In dit geval wordt het gebruikt om het
     * e-mailadres op te halen van de gebruiker die om het opnieuw instellen van het wachtwoord heeft
     * verzocht.
     * 
     * return een MailMessage-object.
     */
    public function toMail($notifiable)
    {
        $url = url(config('app.url').route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', $url)
            ->line('If you did not request a password reset, no further action is required.');
    }
    
}

