<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationTransaction extends Mailable
{
    use Queueable, SerializesModels;

    public $deposit, $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deposit, $amount)
    {
        $this->deposit = $deposit;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mails.confirmation');
    }
}
