<?php

namespace App\Models;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author_name',
        'author_bios',
        'email',
        'description',
        'user_id',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function BlogPost()
    {
        return $this->belongsTo(BlogPost::class, "blog_id");
    }
}
