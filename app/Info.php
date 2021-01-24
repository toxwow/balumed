<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'working_days', 'holiday_days', 'phone_one', 'phone_two'
    ];
}
