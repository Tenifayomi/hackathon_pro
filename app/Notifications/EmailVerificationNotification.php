<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Ichtrojan\Otp\Otp;

class EmailVerificationNotification extends Notification
{
    use Queueable;
    public $mailer;
    public $message;
    public $subject;
    public $fromEmail;
    public $otp;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->mailer ='smtp';
        $this->message = 'Welcome on board';
        $this->subject = 'Email Verification';
        $this->otp = new Otp();
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
    public function toMail(object $notifiable): MailMessage
    {
        $mainOtp = $this->otp->generate($notifiable->email, "numeric", 4 ,60);

        return (new MailMessage)
        ->subject($this->subject)
        ->greeting("Hello")
        ->line($this->message)
        ->line("Use this OTP:" . $mainOtp->token);
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
