<?php

namespace App\Mail;

use App\Models\UserData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserDataMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;

    public function __construct(UserData $userData) {
        $this->userData = $userData;
    }

    public function build()
    {
        return $this
            ->subject('Новый пользователь зарегистрирован')
            ->view('mail.mail');
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
