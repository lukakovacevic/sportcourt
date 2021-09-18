<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SportActivityMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $field_address)
    {
        $this->username = $username;
        $this->field_address = $field_address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('luka.kovacevic23@gmail.com')
            ->markdown('emails.message')
            ->with([
                'username' => $this->username,
                'address' => $this->field_address
            ]);
    }
}
