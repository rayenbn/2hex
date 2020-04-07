<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\User\User;
use App\Notifications\Auth\ConfirmEmail;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use App\Mail\AccountConfirmed;

class ConfirmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Confirm user email
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm(User $user)
    {
        $user->confirmed = true;
        $user->confirmed_date = date('Y-m-d h:m:s');
        $user->save();

        \Mail::to($user)->send(new AccountConfirmed());

        auth()->login($user);

        return redirect('/');
    }

    public function sendEmail(User $user)
    {
        //create confirmation code
        $user->confirmation_code = Uuid::uuid4();
        $user->save();

        //send email
        $user->notify(new ConfirmEmail());

        return back()->with('status', __('auth.confirm'));
    }
}
