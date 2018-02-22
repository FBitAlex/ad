<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subs;
    public $mail_text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $subscriber, $mail_text ) {
        $this->subs = $subscriber;
        $this->text = $mail_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.invite');
    }
}
