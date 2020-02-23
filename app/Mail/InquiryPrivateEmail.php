<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryPrivateEmail extends Mailable
{
    use SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public $data;
    public function __construct(array $data = [])
    {
        $this->data  = $data;
    }
    public function build()
    {
        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->bcc($this->data['email'], $this->data['name'])
            ->subject('New Private Inquiries')
            ->markdown('emails.privateinquiries');
    }
}
