<?php

namespace App\Models\Blogs;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function Blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
