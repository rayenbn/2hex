<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BookSubscribe;
use App\Models\Auth\User\User;
use App\Mail\EmailBook;
class EmailToBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Book to Registered Users';

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
        $users = BookSubscribe::all();
        foreach($users as $user){
            $date = strtotime($user['created_at']);
            $now = strtotime(date('Y-m-d H:i:s'));

            $check = User::where('email', $user['email'])->count();
            if($check > 0)
                continue;
            /////////Live/////////
            
            $difference = ($now - $date) / 3600;
            $type = 0;


            //   if($difference < 1801 && $difference >= 1800){
            //    $type = 9;
            // }
            //  if($difference < 1401 && $difference >= 1400){
            //    $type = 8;
            //  }
            //  if($difference < 1081 && $difference >= 1080){
            //    $type = 7;
            //     }

            else if($difference < 721 && $difference >= 720){
                $type = 6;
            }
            else if($difference < 337 && $difference >= 336){
                $type = 5;
            }

            else if($difference < 169 && $difference >= 168){
                $type = 4;
            }
            else if($difference < 48 && $difference >= 47){
                $type = 3;
            }
            else if($difference < 24 && $difference >= 23){
                $type = 2;
            }

            

            /////////Test/////////
            /*$difference = ($now - $date) / 60;
            var_dump($difference);
            $type = 2;
            if($difference < 17 && $difference >= 16){
                $type = 9;
            }
            if($difference < 15 && $difference >= 14){
                $type = 8;
            }
            if($difference < 13 && $difference >= 12){
                $type = 7;
            }
            else if($difference < 11 && $difference >= 10){
                $type = 6;
            }
            else if($difference < 9 && $difference >= 8){
                $type = 5;
            }
            else if($difference < 7 && $difference >= 6){
                $type = 4;
            }
            else if($difference < 5 && $difference >= 4){
                $type = 3;
            }
            else if($difference < 3 && $difference >= 2){
                $type = 2;
            }*/
            /*var_dump($type);
            var_dump($user['email']);*/


            if($type != 0)
                \Mail::to($user['email'])->send(new EmailBook(['id'=>$user->id, 'name' => $user->name, 'type' => $type]));
        }
    }
}
