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
        return $this->belongsTo(User::class);
    }

    public static function friendCheck($users)
    {
        $friend_users = $users->map(function ($user) {
            $auth_user = auth()->user()->id;
            $fromFriendRequests = $user->fromFriendRequest;
            $toFriendRequests = $user->toFriendRequest;
            $user->is_friend = false;

            foreach ($fromFriendRequests as $fri) {
                if ($fri->to_user == $auth_user && $fri->status == "accept") {
                    return $user->is_friend = true;
                }
            }

            if (!$user->is_friend) {
                foreach ($toFriendRequests as $fri) {
                    if ($fri->from_user == $auth_user && $fri->status == "accept") {
                        return $user->is_friend = true;
                    }
                }
            }

            return $user;
        });

        return $friend_users;
    }
}
