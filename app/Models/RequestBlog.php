<?php

namespace App\Models;

use App\Models\Enums\BlogRequestTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBlog extends Model
{
    use HasFactory;

    protected $table = 'blog_requests';
    
    protected $fillable = [
        'title',
        'slug',
        'logo',
        'category_id',
        'author_name',
        'author_bios',
        'email',
        'sample_file',
        'description',
        'user_id',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getAcsrBlogRequestStatusAttribute()
    {
        return BlogRequestTypes::$values[$this->status];
    }
}
