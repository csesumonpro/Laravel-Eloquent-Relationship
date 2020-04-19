<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable','taggables');
    }
}
