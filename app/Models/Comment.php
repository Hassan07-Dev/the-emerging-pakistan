<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'blog_id', 'comment_text', 'comment_id', 'approval', 'status'];

    public function commentReplies(){
        return $this->hasMany(Self::class,'comment_id','id');
    }

    public function getUser(){
        return $this->belongsTo (User::class, 'user_id', 'id');
    }

    public function getBlog(){
        return $this->belongsTo (Blog::class, 'blog_id', 'id')->select('id', 'title');
    }
}
