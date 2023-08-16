<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = [
        'post_thumbnail',
        'title',
        'slug',
        'description',
        'content',
        'is_feature',
        'blog_id'
    ];

    public function Blog()
    {
        return $this->hasMany(Blog::class, 'id');
    }
}
