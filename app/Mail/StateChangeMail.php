<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Incidence;

class StateChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $incidence;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($incidence)
    {
        $this->incidence = $incidence;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mails.incidence');
        return $this->from('j_medi_rome@hotmail.com')
            ->view('mails.incidence')
            ->text('mails.incidence_plain');
    }
}
