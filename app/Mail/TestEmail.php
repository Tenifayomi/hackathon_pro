<?php

namespace App\Mail;

use Ichtrojan\Otp\Models\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class TestEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailer;
    public $message;
    public $subject;
    public $fromEmail;
    public $otp;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->mailer ='smtp';
        $this->message = 'Welcome on board';
        $this->subject = 'Email Verification';
        $this->otp = new Otp();
    }
    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
