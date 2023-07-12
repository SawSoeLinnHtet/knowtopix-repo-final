<?php

namespace App\Models\Site;

use App\Models\User;
use App\Models\Site\Post\PostLike;
use App\Models\Site\Post\PostComment;
use Illuminate\Database\Eloquent\Builder;
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

    public static function getWithLike($posts)
    {
        return $posts->map(function ($post) {
            $post_likes = $post->PostLike;
            $is_liked = false;

            foreach ($post_likes as $like) {
                $is_liked = $like->user_id == auth()->guard('user')->user()->id;
            }

            return $post->is_liked = $is_liked;
        });
    }

    public function scopeFilter(Builder $query, array $filter)
    {
        return $query->when($filter['search'] ?? false, function ($q, $filter) {
            $q->where('content_area', 'LIKE', "%" . $filter . "%");
        });
    }
}
