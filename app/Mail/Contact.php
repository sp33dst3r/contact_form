<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $req = [];
    public function __construct($request)
    {
        $this->req['name'] = $request->name;
        $this->req['phone'] = $request->phone;
        $this->req['message'] = $request->message;
        //dd($request->name);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contact Form')
                    ->view('emails.welcome');
    }
}
