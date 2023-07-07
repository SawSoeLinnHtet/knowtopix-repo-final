<?php

namespace App\Models\Site;

use App\Models\User;
use App\Models\Site\Post\PostLike;
use App\Models\Site\Post\PostComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'content_area',
        'user_id',
        'thumbnail'
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function PostLike(){
        return $this->hasMany(PostLike::class, 'post_id');
    }

    public function PostComment()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }
}
