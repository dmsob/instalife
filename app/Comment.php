<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['descr'];

    public function post() {

        return $this->belongsTo(Post::Class);

    }

    public function user() {

        return $this->belongsTo(User::Class,'author_id');

    }
}
