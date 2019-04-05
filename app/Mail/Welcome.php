<?php

namespace LaraDex\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $welcomeMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($welcomeMessage)
    {
        $this->welcomeMessage = $welcomeMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('scr.eusse@gmail.com')
                    ->view('emails.welcome');
    }
}
