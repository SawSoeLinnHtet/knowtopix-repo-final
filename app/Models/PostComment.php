<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment'
    ];

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getAcsrCreatedAtAttribute()
    {
        $created_at = $this->created_at->diffForHumans();
        $created_at = str_replace([' seconds ago', ' second ago'], 's', $created_at);
        $created_at = str_replace([' minutes ago', ' minute ago'], 'm', $created_at);
        $created_at = str_replace([' hours ago', ' hour ago'], 'h', $created_at);
        $created_at = str_replace([' days ago', ' day ago'], 'd', $created_at);
        $created_at = str_replace([' months ago', ' month ago'], 'm', $created_at);

        if (preg_match('(years|year)', $created_at)) {
            $created_at = $this->created_at->toFormattedDateString();
        }

        return $created_at;
    }

    public function getAcsrCommentUserLinkAttribute()
    {
        if ($this->user_id == auth()->user()->id) {
            return route('site.profile.index', auth()->user()->username);
        }
        return route('site.friend.details', $this->user_id);
    }
}
