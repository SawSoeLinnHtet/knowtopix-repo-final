<?php

namespace App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Friend extends Model
{
    use HasFactory;

    protected $table = 'friend_requests';

    protected $fillable = [
        'from_user',
        'to_user',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
