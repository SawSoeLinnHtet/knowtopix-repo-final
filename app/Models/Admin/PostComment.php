<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use App\Models\Enums\StatusTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostComment extends Model
{
    use HasFactory;

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getAcsrCommentStatusValueAttribute()
    {
        $privacy_text = StatusTypes::$values[$this->status];

        return $privacy_text;
    }
}
