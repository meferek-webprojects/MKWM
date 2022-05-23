<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $message;
    public $mailTo;
    public $author;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $author, $title, $mailTo = "mkwm.studios@outlook.com")
    {   
        $this->title = '[KONTAKT] '.$title;
        $this->message = $message;
        $this->mailTo = $mailTo;
        $this->author = $author;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->markdown('emails.contact-plain');
        $this->subject('[KONTAKT]');
        $this->from('mkwm.studios@outlook.com', 'MKWM');
        
        return $this;
    }
}
