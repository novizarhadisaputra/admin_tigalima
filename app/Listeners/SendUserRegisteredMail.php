<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $data = json_decode(json_encode($event->data));
        $data->token = Crypt::encryptString(Carbon::now() . $data->email);
        Mail::subject('Welcome to 35 Homestay')->to($data->email)->send(new UserRegisteredMail($data));
    }
}
