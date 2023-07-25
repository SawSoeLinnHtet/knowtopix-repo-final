<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use App\Models\Admin\PostLike;
use App\Models\Admin\PostComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function Like()
    {
        return $this->belongsTo(PostLike::class, 'user_id');
    }

    public function Comment()
    {
        return $this->hasMany(PostComment::class, 'user_id');
    }
}
