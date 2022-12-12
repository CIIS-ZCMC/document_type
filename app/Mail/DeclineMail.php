<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeclineMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $clientapplication;
    public $clientdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $clientapplication, $clientdetails)
    {
        $this->details = $details;
        $this->clientapplication = $clientapplication;
        $this->clientdetails = $clientdetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Social Welfare and Development')->view('pages.email.declinemail');
    }
}
