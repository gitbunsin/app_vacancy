<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $admin_mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin_mail)
    {
        //
        $this->admin_mail = $admin_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/forgot_canidate_password.blade');
    }
}
