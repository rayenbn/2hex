<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryCompanyEmail extends Mailable
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
            ->from(config($this->data['email'], $this->data['name']))
            ->bcc($this->data['email'], $this->data['name'])
            ->subject('2HEX Company Production Inquiry')
            ->markdown('emails.companyinquiries');
    }
}
