<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
use App\Models\Comment;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 
        'post_id', 
        'user_id', 
        'message'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function comment() {
        return $this->belongsTo(Comment::class);
    }
}
