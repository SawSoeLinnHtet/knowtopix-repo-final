<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use function PHPUnit\Framework\isNull;

class Friend extends Model
{
    use HasFactory;

    protected $table = 'friend_requests';

    protected $fillable = [
        'from_user',
        'to_user',
        'status'
    ];

    public function RequestToUser()
    {
        return $this->belongsTo(User::class, 'to_user');
    }

    public function RequestFromUser()
    {
        return $this->belongsTo(User::class, 'from_user');
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

    public  static function getFriendUser($user){
        $friend = Friend::where('from_user', auth()->user()->id)->where('to_user', $user->id)->where('status', 'accept')
            ->orWhere('from_user', $user->id)->where('to_user', auth()->user()->id)->where('status', 'accept')->first();

        return $friend;
    }

    public static function isPendingFriend($id)
    {
        $pending_friend_to = Friend::where('to_user', $id)->where('from_user', auth()->user()->id)->pluck('id')->toBase();
        $pending_friend_from = Friend::where('from_user', $id)->where('to_user', auth()->user()->id)->pluck('id')->toBase();
        if(isset($pending_friend_to) && isset($pending_friend_from)){
            return true;
        }
        
        return false;
    }
}
