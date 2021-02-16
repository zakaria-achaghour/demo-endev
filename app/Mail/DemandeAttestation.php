<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemandeAttestation extends Mailable
{
    use Queueable, SerializesModels;
    public $participant;
    public $designation;
    public $ref;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $participant , $designation , $ref)
    {
        $this->participant = $participant;
        $this->designation = $designation;
        $this->ref = $ref;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Demande Attestaion de Formation '.$this->designation)
        ->view('emails.participant.demande',['participant'=>$this->participant,'designation'=>$this->designation,'ref'=>$this->ref]);
    }
}
