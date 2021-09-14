<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFriendRequest;
use App\Models\User;
use App\Models\UserFriends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserFriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUserFriends(Request $request)
    {    
    $user_friends = UserFriends::where('user_id', auth()->user()->id)->get();

    return view('users/friends_list', compact('user_friends'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriendRequest $request)
    {
        $friend = User::where('username', $request['friend_username'])->first();
        $friend_id = $friend->id;
        if(UserFriends::where('user_id', auth()->user()->id)->where('friend_id', $friend_id)->first()){
            return Redirect::back()->withErrors('Friend already added');
        }
        UserFriends::create([
            'user_id' => auth()->user()->id,
            'friend_id' => $friend_id
        ]);
        return redirect()->route('friends_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserFriends  $userFriends
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        UserFriends::where('user_id', auth()->user()->id)->where('friend_id', $id)->delete();
        return redirect()->route('friends_list')->with('success','Task deleted successfully');
    }
}
