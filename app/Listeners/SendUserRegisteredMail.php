<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\UserRegisteredMail;
use App\Models\Token;
use App\User;
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
        if (!isset($data->id)) {
            $data->id = (User::where('email', $data->email)->first())->id;
        }
        $data->token = Crypt::encryptString(Carbon::now() . $data->email);
        Token::create([
            'token' => $data->token,
            'type' => 'Verify User',
            'users_id' => $data->id,
            'status' => true,
            'expired_at' => Carbon::now()->addMinute(env('EXPIRED_TOKEN')),
        ]);
        Mail::to($data->email)->send(new UserRegisteredMail($data));
    }
}
