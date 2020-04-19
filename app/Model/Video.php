<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
