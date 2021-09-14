<?php

namespace App\Http\Controllers;

use App\Mail\SportActivityMail;
use App\Models\SportField;
use App\Models\User;
use App\Models\UserFriends;
use App\Models\UserSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserScheduleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        UserSchedule::create([
            'user_id' => auth()->user()->id,
            'sport_field_id' => $id,
            'time' => $request['time']
        ]);
        $user_favorites = UserFriends::where('user_id', auth()->user()->id)->get();
        $field = SportField::where('id', $id)->first();
        $field_address = $field->address;
        foreach($user_favorites as $favorite)
        {
            $user = User::where('id', $favorite->friend_id)->first();
            $username = $user->username;
            Mail::to($user->email)->send(new SportActivityMail($username, $field_address));
        }
        

        return redirect()->route('show_field', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSchedule  $userSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSchedule $userSchedule)
    {
        //
    }
}
