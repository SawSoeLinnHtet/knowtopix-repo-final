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
            $user->friend_status = false;

            foreach ($fromFriendRequests as $fri) {
                if ($fri->to_user == $auth_user && $fri->status == "accept") {
                    return $user->friend_status = 'accept';
                }else if($fri->to_user == $auth_user && $fri->status == "pending") {
                    return $user->friend_status = 'pending';
                }else{
                    return;
                }
            }

            if (!$user->friend_status) {
                foreach ($toFriendRequests as $fri) {
                    if ($fri->from_user == $auth_user && $fri->status == "accept") {
                        return $user->friend_status = 'accept';
                    }else if($fri->from_user == $auth_user && $fri->status == "pending") {
                        return $user->friend_status = 'pending';
                    }
                }
            }

            return $user;
        });

        return $friend_users;
    }
}
