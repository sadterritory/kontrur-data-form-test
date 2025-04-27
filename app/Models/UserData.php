<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    public $fillable = [
        'user_name',
        'phone_number',
        'email',
    ];
}
