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
        $date = strtotime($this->data['date']);
        $now = strtotime("now");

        $difference = round(abs($now - $date) / 3600,2);
        if($difference < 481 && $difference >= 480){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>8]);
            return $this
                ->from('niklas@2hex.com', "Niklas")
                ->bcc('customermails@2hex.com')
                ->subject('Message from the CEO of 2HEX')
                ->markdown('emails.registers.register8');
        }
        else if($difference < 361 && $difference >= 360){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>7]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Re: 50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register7');
        }
        else if($difference < 289 && $difference >= 288){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>6]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Re: 50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register6');
        }
        else if($difference < 169 && $difference >= 168){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>5]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Re: 50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register5');
        }
        else if($difference < 45 && $difference >= 44){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>4]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('50 USD support to get you started on 2HEX')
                ->markdown('emails.registers.register4');
        }
        else if($difference < 25 && $difference >= 24){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>3]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('Do you want to build a big skateboard company?')
                ->markdown('emails.registers.register3');
        }
        else if($difference < 3 && $difference >= 2){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>2]);
            return $this
                ->from('josh@2hex.com', "Josh")
                ->bcc('customermails@2hex.com')
                ->subject('What a perfect order looks like at 2HEX')
                ->markdown('emails.registers.register2');
        }
        else if($difference <= 1 && $difference > 0){
            User::where('id', $this->data['id'])->update(['email_sent'=>date("Y-m-d H:i:s"),'last_email'=>1]);
            return $this
                ->from('welcome@2HEX.com', "2Hex Team")
                ->bcc('customermails@2hex.com')
                ->subject('Welcome, watch the video of how to order on 2HEX.')
                ->markdown('emails.registers.register1');
        }
    }
}
