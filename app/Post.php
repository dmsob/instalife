<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @method static join(string $string, string $string1, string $string2, string $string3)
 */
class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
