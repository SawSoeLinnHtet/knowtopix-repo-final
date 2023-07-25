<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostLike extends Model
{
    use HasFactory;

    public function Post()
    {
        return $this->belongsTo(Post::class, 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
