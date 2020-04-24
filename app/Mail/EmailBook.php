<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\BookSubscribe;

class EmailBook extends Mailable
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
        $type = $this->data['type'];
        if($type == 9){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>9]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('2HEX bearings')
                ->markdown('emails.books.books9');
        }
        if($type == 8){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>8]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('2HEX griptape')
                ->markdown('emails.books.books8');
        }
        else if($type == 7){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>7]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('Check out our wheels!')
                ->markdown('emails.books.books7');
        }
        else if($type == 6){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>6]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('2HEX Skateboard Deck Photos')
                ->markdown('emails.books.books6');
        }
        else if($type == 5){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>5]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('How are you skateboard company plans going?')
                ->markdown('emails.books.books5');
        }
        else if($type == 4){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>4]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('How would you improve the skateboard founders book?')
                ->markdown('emails.books.books4');
        }
        else if($type == 3){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>3]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('How much would your skateboard company make?')
                ->markdown('emails.books.books3');
        }
        else if($type == 2){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>2]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('Hey'.$this->data['name'].', did you register on 2HEX yet?')
                ->markdown('emails.books.books2');
        }
        else if($type == 1){
            BookSubscribe::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>1]);
            return $this
                ->from('niklas@2HEX.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject("Your copy of ‘The Skateboard Company Founders Book’")
                ->markdown('emails.books.books1');
        }
    }
}
