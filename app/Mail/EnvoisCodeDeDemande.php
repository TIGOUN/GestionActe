<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvoisCodeDeDemande extends Mailable
{
    use Queueable, SerializesModels;

    public $data = []; // Données pour la vue

    public function __construct(Array $demande)
    {
        $this->data = $demande;
    }

    public function build()
    {
        return $this->from("tigounzinsou@gmail.com") // L'expéditeur
                    ->subject("Code de votre demande") // Le sujet
                    ->view('emails.codedemande');
  }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}