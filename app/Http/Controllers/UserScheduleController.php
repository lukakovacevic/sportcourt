<?php

namespace App\Http\Controllers;

use App\Mail\SportActivityMail;
use App\Models\SportField;
use App\Models\User;
use App\Models\UserFriends;
use App\Models\UserSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserScheduleController extends Controller
{
    public function store(Request $request, $id)
    {
        $existing_schedule = UserSchedule::where('user_id', auth()->user()->id)
                                ->where('sport_field_id', $id)
                                ->where('time', $request['time'])
                                ->where('type_id', $request['type_id'])
                                ->first();
                                
        if(isset($existing_schedule)){
            $day = Carbon::today()->format('d');
            $existin_schedule_day = $existing_schedule->created_at->format('d');

            if($day == $existin_schedule_day)
            {
                return redirect()->route('show_field', $id)->withErrors('You are already signed at this time');
            }
        }
        
        UserSchedule::create([
            'user_id' => auth()->user()->id,
            'sport_field_id' => $id,
            'time' => $request['time'],
            'type_id' => $request['type_id']
        ]);
        $user_favorites = UserFriends::where('user_id', auth()->user()->id)->get();
        $field = SportField::where('id', $id)->first();
        $field_address = $field->address;
        foreach($user_favorites as $favorite)
        {
            $user = User::where('id', $favorite->friend_id)->where('has_accepted', 1)->first();
            if($user){
                $username = $user->username;
            Mail::to($user->email)->send(new SportActivityMail($username, $field_address));
            }
            
        }

        return redirect()->route('show_field', $id);
    }

}
