<?php

namespace LaraDex\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Bienvenida extends Mailable
{
    use Queueable, SerializesModels;

    public $username = "Javier";
    public $useremail = "javier@mail.com";  
    public $userplan = "TRIAL";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('maileclipse::templates.bienvenidaUsuario')
                    ->from('scr.eusse@gmail.com');
    }
}
