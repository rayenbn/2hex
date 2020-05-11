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
            ->from($this->data['email'], $this->data['name'])
            ->bcc($this->data['email'], $this->data['name'])
            ->subject('Skateboard Production Company Inquiries By')
            ->markdown('emails.companyinquiries');
    }
}
