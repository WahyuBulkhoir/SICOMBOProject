<?php


namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactFormMail extends Mailable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Pesan dari: ' . $this->data['email'])
                    ->view('emails.contact')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'phone' => $this->data['phone'],
                        'description' => $this->data['description'],
                    ]);
    }
}
