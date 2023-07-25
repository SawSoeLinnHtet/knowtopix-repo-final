<?php

namespace App\Models\Admin;

use App\Models\Admin\User;
use Illuminate\Support\Str;
use App\Models\Admin\PostLike;
use App\Models\Enums\PostTypes;
use App\Models\Admin\PostComment;
use App\Models\Enums\StatusTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Comment()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }

    public function Like()
    {
        return $this->hasMany(PostLike::class, 'post_id');
    }

    public function getAcsrWordLimitAttribute()
    {
        $new_text = wordwrap($this->content_area, 80, "<br/>");
        $string = Str::of($new_text)->words(20, '<a href="#" class="btn btn-link text-info">See More</a>');
        echo $string;
    }

    public function getAcsrPostPrivacyValueAttribute()
    {
        $privacy_text = PostTypes::$values[$this->privacy];

        return $privacy_text;
    }

    public function getAcsrPostStatusValueAttribute()
    {
        $privacy_text = StatusTypes::$values[$this->status];

        return $privacy_text;
    }
}
