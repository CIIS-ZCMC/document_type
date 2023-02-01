<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CardMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $clientcardsave;
    public $clientusersave;
    public $clientdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $clientcardsave, $clientdetails,$clientusersave)
    {
      
        $this->details = $details;
        $this->clientcardsave = $clientcardsave;
        $this->clientdetails = $clientdetails;
        $this->clientusersave = $clientusersave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->subject('Mail from Social Welfare and Development')->view('pages.email.cardmail');
        return $this->subject('Mail from Social Welfare and Development')->view('pages.email.cardmail');
    }
}
