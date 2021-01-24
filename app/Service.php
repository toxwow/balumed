<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'icon', 'slug', 'intro'
    ];

    public function specialists()
    {
        return $this->hasMany(Specialist::class);
    }
}
