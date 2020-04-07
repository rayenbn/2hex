<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Auth\User\User;

class EmailToRegister extends Mailable
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
        if($type == 8){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>8]);
            return $this
                ->from('niklas@2hex.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('Message from the CEO of 2HEX')
                ->markdown('emails.registers.register8');
        }
        else if($type == 7){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>7]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Re: 50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register7');
        }
        else if($type == 6){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>6]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Re: 50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register6');
        }
        else if($type == 5){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>5]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Re: 50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register5');
        }
        else if($type == 4){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>4]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register4');
        }
        else if($type == 3){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>3]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Do you want to build a big skateboard company?')
                ->markdown('emails.registers.register3');
        }
        else if($type == 2){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>2]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('What a perfect order looks like at 2HEX')
                ->markdown('emails.registers.register2');
        }
        else if($type == 1){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>1]);
            return $this
                ->from('welcome@2HEX.com', "2Hex Team")
                ->bcc('customermails@2hex.com')
                ->subject('Welcome, watch the video of how to order on 2HEX.')
                ->markdown('emails.registers.register1');
        }
    }
}
