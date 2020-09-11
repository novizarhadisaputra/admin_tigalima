<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'token', 'type', 'users_id', 'status', 'expired_at',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'users_id', 'id');
    }
}
