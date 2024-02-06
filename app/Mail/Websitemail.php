<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Websitemail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;


    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }



    public function build()
    {
        return $this->view('email.email')->with([
            'subject' => $this->subject
        ]);
    }



    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Websitemail',
    //     );
    // }



    // public function content()
    // {
    //     return new Content(
    //         view: 'email.email',
    //         with: ['subject' => $this->subject],
    //     );
    // }



    // public function attachments()
    // {
    //     return [];
    // }
}
