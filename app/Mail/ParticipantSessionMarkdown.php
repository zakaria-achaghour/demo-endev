<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipantSessionMarkdown extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $designation;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user , $designation,$password)
    {
        $this->user = $user;
        $this->designation = $designation;
        $this->password = $password;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('inscription au formation '.$this->designation)
        ->markdown('emails.participant.participant-markdown',['participant'=>$this->user,'designation'=>$this->designation,'password'=>$this->password]);
    }
}
