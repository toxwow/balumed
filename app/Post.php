<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'contents', 'status', 'photo'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);

    }
}
