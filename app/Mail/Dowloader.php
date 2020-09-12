<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Dowloader extends Mailable
{
    use Queueable, SerializesModels;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $address = 'no-reply@stanlabvr.com';
      $subject ="Book Downloaded";
      $name = 'Book';

      $email = $this->mail;


      return $this->view('mail',compact('email'))
        ->from($address,$name)
        ->subject($subject);
    }
}
