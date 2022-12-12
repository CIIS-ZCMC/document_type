<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScheduleMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $clientschedulesave;
    public $clientdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $clientschedulesave, $clientdetails)
    {
        $this->details = $details;
        $this->clientschedulesave = $clientschedulesave;
        $this->clientdetails = $clientdetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Social Welfare and Development')->view('pages.email.schedulemail');
    }
}
