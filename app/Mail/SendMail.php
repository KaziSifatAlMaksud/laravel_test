<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $email;
    public $password;
    public $address;
    public $city;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $email, $password, $address, $city)
    {
        $this->data = $data;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->city = $city;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('test Subject')->view('send') // Specify your email blade view here
            ->with([
                'email' => $this->email,
                'password' => $this->password,
                'address' => $this->address,
                'city' => $this->city,
            ]);
    }
}
