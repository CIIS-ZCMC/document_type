<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IdMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $clientcarddetails;
    public $clientdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $clientcarddetails, $clientdetails)
    {
        $this->details = $details;
        $this->clientcarddetails = $clientcarddetails;
        $this->clientdetails = $clientdetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->markdown('pages.email.idmail')->subject('Mail from Social Welfare and Development')->attach(public_path('/'.$this->clientcarddetails->identification));
    }
}
