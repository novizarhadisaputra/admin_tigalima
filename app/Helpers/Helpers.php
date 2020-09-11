<?php

use App\Models\Token;
use Illuminate\Support\Carbon;

function checkToken($token)
{
    $result = Token::where('token', $token)
        ->where('expired_at', '>=', Carbon::now())->first();

    if (!$result) {
        return false;
    }

    $result->update(['status' => false]);

    return true;
}
