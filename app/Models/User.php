<?php

namespace App\Models;

use App\Models\Enums\StatusTypes;
use App\Models\Post;
use App\Models\Friend;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PostLike;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        'profile',
        'address',
        'gender',
        'personal_info',
        'status'
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


    public function Blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function RequestBlog()
    {
        return $this->hasMany(RequestBlog::class);
    }

    public function PostLike()
    {
        return $this->hasMany(PostLike::class, 'user_id');
    }

    public function PostComment()
    {
        return $this->hasMany(PostComment::class);
    }

    public function fromFriendRequest()
    {
        return $this->hasMany(Friend::class, 'from_user');
    }

    public function toFriendRequest()
    {
        return $this->hasMany(Friend::class, 'to_user');
    }

    public static function GetNotRequestFriend($current_user_id, $pending_user_ids, $suggested_user_ids)
    { 
        $friend_ids = array_merge($pending_user_ids, $suggested_user_ids, [$current_user_id]);
                
        $users = User::whereNotIN('id', $friend_ids)->orderBy('created_at', 'desc')->paginate(6);
        
        return $users;
    }

    public function scopeFilter(Builder $query, array $filter)
    {
        return $query->when($filter['search'] ?? false, function ($q, $filter) {
            $q->where('name', 'LIKE', "%" . $filter . "%")->orWhere('username', 'LIKE', "%" . $filter . "%");
        });
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAcsrCheckProfileAttribute()
    {
        if(isset($this->profile)){
            return asset('images/profile/' . $this->profile);
        }
        return asset('site/img/noprofile.png');
    }

    public function getAcsrUserStatus()
    {
        if($this->status == StatusTypes::ACTIVE){
            //
        }
    }

    public function getAcsrCheckUserLinkAttribute()
    {
        if($this->id == auth()->user()->id){
            return route('site.profile.index', auth()->user()->username);
        }
        return route('site.friend.details', $this->id);
    }

    public function getAcsrAcceptFriendAttribute()
    {
        $pending_user_ids = Friend::where('from_user', $this->id)->where('status', 'accept')->pluck('to_user')->toArray();
        $suggested_user_ids = Friend::where('to_user', $this->id)->where('status', 'accept')->pluck('from_user')->toArray();

        $friend_ids = array_merge($pending_user_ids, $suggested_user_ids);

        return $friend_ids;
    }

    public function getAcsrFriendCountAttribute()
    {
        $pending_user_ids = Friend::where('from_user', $this->id)->where('status', 'accept')->pluck('to_user')->toArray();
        $suggested_user_ids = Friend::where('to_user', $this->id)->where('status', 'accept')->pluck('from_user')->toArray();

        $friend_count = array_merge($pending_user_ids, $suggested_user_ids);

        return count($friend_count);
    }
}
