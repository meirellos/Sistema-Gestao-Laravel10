<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComprovanteVendaEmail extends Mailable
{

    public $mailData;

    use Queueable, SerializesModels;
    public function __construct($mailData)
    {
        //
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Comprovante Venda',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.comprovante_venda',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
