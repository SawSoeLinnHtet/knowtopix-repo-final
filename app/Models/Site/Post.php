<?php

namespace App\Models\Site;

use App\Enums\PostPrivacyEnum;
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
        'thumbnail',
        'privacy'
    ];

    protected $casts = [
        'privacy' => PostPrivacyEnum::class
    ];

    public function setStatus(PostPrivacyEnum $privacy)
    {
        $this->privacy = $privacy;
    }
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
                $is_liked = $like->user_id == auth()->user()->id;
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

    public function privacyIcon($privacy)
    {
        if(PostPrivacyEnum::PUBLIC() == $privacy){
            return 'fa-earth-americas text-primary';
        }elseif(PostPrivacyEnum::FRIEND() == $privacy){
            return 'fa-user-group text-info';
        }else{
            return 'fa-lock text-danger';
        }
    }

    public function getAcsrCreatedAtAttribute()
    {
        $created_at = $this->created_at->diffForHumans();
        $created_at = str_replace([' seconds ago', ' second ago'], 's', $created_at);
        $created_at = str_replace([' minutes ago', ' minute ago'], 'm', $created_at);
        $created_at = str_replace([' hours ago', ' hour ago'], 'h', $created_at);
        $created_at = str_replace([' months ago', ' month ago'], 'm', $created_at);

        if (preg_match('(years|year)', $created_at)) {
            $created_at = $this->created_at->toFormattedDateString();
        }

        return $created_at;
    }
}
