<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentAddedEmail extends Mailable
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
            ->subject('New Private Inquiries')
            ->markdown('emails.commentadded');
    }
}