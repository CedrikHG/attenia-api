<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'focus_sessions';

    protected $fillable = [
        'duration',
        'date',
        'user_id'
    ];
}