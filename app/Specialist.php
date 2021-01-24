<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'photo', 'slug', 'titlePerson'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
