<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFriendRequest;
use App\Models\User;
use App\Models\UserFriends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserFriendsController extends Controller
{
    public function listUserFriends(Request $request)
    {    
    $user_friends = UserFriends::where('user_id', auth()->user()->id)->get();
    $to_accept = array();
    $sent_request = UserFriends::where('friend_id', auth()->user()->id)->where('has_accepted', false)->get();
    foreach($sent_request as $sent){
        $not_accepted_friend = UserFriends::where('user_id', auth()->user()->id)->where('friend_id', $sent->user_id)->first();
        if(!$not_accepted_friend){
            $to_accept[] = [
                'username' => $sent->user->username,
                'to_accept_id' => $sent->id
        ];
        }
    }
        
    return view('users/friends_list', compact(['user_friends', 'to_accept']));
    }

    public function store(StoreFriendRequest $request)
    {
        $friend = User::where('username', $request['friend_username'])->first();
        $friend_id = $friend->id;
        if(UserFriends::where('user_id', auth()->user()->id)->where('friend_id', $friend_id)->first()){
            return Redirect::back()->withErrors('Friend already added');
        }
        UserFriends::create([
            'user_id' => auth()->user()->id,
            'friend_id' => $friend_id,
            'has_accepted' => false
        ]);

        return redirect()->route('friends_list');
    }

    public function acceptFriend($username)
    {
        $user = User::where('username', $username)->first();
        $accepted_friend = UserFriends::where('user_id', $user->id)->where('friend_id', auth()->user()->id);
        $accepted_friend->update([
            'has_accepted' => 1
        ]);
        UserFriends::create([
            'user_id' => auth()->user()->id,
            'friend_id' => $user->id,
            'has_accepted' => 1
        ]);

        return redirect()->route('friends_list')->with('success','Friend accepted successfully');
    }

    public function destroy($id)
    {  
        UserFriends::where('id', $id)->delete();
        return redirect()->route('friends_list')->with('success','Task deleted successfully');
    }
}
