<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function Post() {
        return $this->belongsTo(Post::class, 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function findByUserAndPost(int $post_id, int $user_id){
        return self::where('post_id', $post_id)->where('user_id', $user_id)->first();
    }


}
