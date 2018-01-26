<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OneMoreReferalMail extends Mailable
{
	use Queueable, SerializesModels;

	public $curr_inv;
	public $need_inv;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct( $currInvite, $needInvite ) {
		$this->curr_inv = $currInvite;
		$this->need_inv = $needInvite;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->view('emails.onemore');
	}
}
