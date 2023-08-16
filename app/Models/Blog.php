<?php

namespace App\Models;

use App\Models\User;
use App\Models\Blogs\Post;
use App\Models\Blogs\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'logo',
        'category_id',
        'author_name',
        'author_bios',
        'email',
        'description',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function BlogPost()
    {
        return $this->belongsTo(BlogPost::class, 'blog_id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getAcsrBlogLogoAttribute()
    {
        if (isset($this->logo)) {
            return asset('images/blogs/logo/' . $this->logo);
        }
        return asset('images/blogs/logo/nologo.png');
    }

    public function scopeFilter(Builder $query, array $filter)
    {
        return $query->when($filter['blog_search'] ?? false, function ($q, $filter) {
            $q->where('title', 'LIKE', "%" . $filter . "%")->orWhere('author_name', 'LIKE', "%" . $filter . "%");
        });
    }
}
