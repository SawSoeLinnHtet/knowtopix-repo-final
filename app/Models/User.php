<?php

namespace App\Models;

use App\Models\Site\Post;
use App\Models\Site\Friend;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Site\FriendRequest;
use App\Models\Site\Post\PostLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'personal_info'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Post()
    {
        return $this->hasMany(Post::class);
    }

    public function PostLike()
    {
        return $this->hasMany(PostLike::class, 'user_id');
    }

    public function PostComment()
    {
        return $this->hasMany(PostComment::class);
    }

    public function GetFriendRequest()
    {
        return $this->hasMany(Friend::class, 'from_user');
    }

    public static function GetNotRequestFriend($current_user_id, $pending_user_ids, $suggested_user_ids)
    { 
        $friend_ids = array_merge($pending_user_ids, $suggested_user_ids, [$current_user_id]);
        $users = User::whereNotIN('id', $friend_ids)->orderBy('created_at', 'desc')->paginate(5);
        return $users;
    }
}
