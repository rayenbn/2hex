<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auth\User\User;
use App\Mail\EmailToRegister;
class EmailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:hour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to Registered Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       //
        // $users = User::where('id','702')->whereNotNull('confirmed_date')->get();
        //$users = User::all();
        $users = User::where('created_at','>','2020-04-12 00:00:00')->whereNotNull('confirmed_date')->get();
        foreach($users as $user){
            $date = strtotime($user['confirmed_date']);
            $now = strtotime(date('Y-m-d h:i:s'));

            $difference = round(abs($now - $date) / 3600,2);
            echo $difference;
            echo $date;
            echo $now;
            $type = 0;
            if($difference < 481 && $difference >= 480){
                $type = 8;
            }
            else if($difference < 361 && $difference >= 360){
                $type = 7;
            }
            else if($difference < 289 && $difference >= 288){
                $type = 6;
            }
            else if($difference < 169 && $difference >= 168){
                $type = 5;
            }
            else if($difference < 45 && $difference >= 44){
                $type = 4;
            }
            else if($difference < 25 && $difference >= 24){
                $type = 3;
            }
            else if($difference < 3 && $difference >= 2){
                $type = 2;
            }
            else if($difference <= 1 && $difference > 0){
                $type = 1;
            }
            if($type != 0)
                \Mail::to($user['email'])->send(new EmailToRegister(['date' => $user['created_at'], 'id'=>$user->id, 'name' => $user->name, 'type' => $type]));
        }
    }
}
