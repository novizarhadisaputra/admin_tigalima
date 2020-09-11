<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'author',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'author', 'id');
    }
}
