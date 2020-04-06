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
        $users = User::where('id','353')->get();
        // $users = User::all();
        foreach($users as $user){
            echo $user['email'];
            \Mail::to('luckygolden0505@gmail.com')->send(new EmailToRegister(['date' => $user['created_at'], 'id'=>$user->id, 'name' => $user->name]));
        }
    }
}
