<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'type', 'slug'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class ,'id');
    }


}
