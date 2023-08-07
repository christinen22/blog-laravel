<?php

namespace App\Mail;

// app/Mail/ContactFormMail.php
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    // app/Mail/ContactFormMail.php
    public function build()
    {
        return $this->view('emails.contact-form');
    }
}
