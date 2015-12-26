<?php

namespace Usama\CommentPack\Model;

use Illuminate\Database\Eloquent\Model;

class CommentChild extends Model
{
    protected $table = 'comments_children';
    protected $fillable = ['user_id', 'comment_id', 'body'];

    public function comments()
    {
        return $this->belongsTo(\Config::get('CommentPack.model'));
    }

    public function user()
    {
        return $this->belongsTo('App\Src\User\User');
    }
}