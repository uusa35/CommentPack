<?php

namespace Usama\CommentPack\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['book_id','user_id','body'];

    public function user() {
        return $this->belongsTo('App\Src\User\User');
    }

    public function children() {
        return $this->hasMany(\Config::get('CommentPack.childModel'));
    }

}
