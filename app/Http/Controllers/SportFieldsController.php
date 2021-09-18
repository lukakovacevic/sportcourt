<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFieldRequest;
use App\Models\Country;
use App\Models\FieldTypes;
use App\Models\SportField;
use App\Models\SportFieldType;
use App\Models\UserSchedule;
use Carbon\Carbon;

class SportFieldsController extends Controller
{
    public function index()
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        $sport_fields = SportField::with(['type'])->get();

        return view('fields/list', compact('sport_fields'));
    }

    public function create()
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        $countries = Country::with(['cities'])->get();
        $types = SportFieldType::all();

        return view('fields/create', compact(['countries', 'types']));
    }

    public function show($id)
    {
        $now = Carbon::now();
        $now_time = $now->toDateString();
        $field = SportField::with('type')->where('id', $id)->first();
        $user_times = UserSchedule::where('user_id', auth()->user()->id)->where('sport_field_id', $id)->whereDay('created_at', now()->day)->get();
        $types = $field->type;
        $user[] = '';
        foreach($types as $type){
            $all_times = UserSchedule::where('sport_field_id', $id)->whereDay('created_at', now()->day)->where('type_id', $type->id)->get();
            $sport_players[] = ['type' => $type->type,
                        'signed_players' => count($user_times)
            ];
        }
        
        return view('fields/show', compact(['field', 'now_time', 'sport_players', 'types', 'user_times']));
    }

    public function store(StoreUserFieldRequest $request)
    {
        $sport_field = SportField::create([
            'address' => $request['address'],
            'longitude' => $request['longitude'],
            'latitude' => $request['latitude'],
            'city_id' => $request['city_id'],
            'field_number' => $request['field_number'],
            'country_id' => $request['country_id'],
            'number_of_courts' => $request['number_of_courts'],
        ]);

        foreach($request['types'] as $type){
            FieldTypes::create([
                'type_id' => $type,
                'field_id' => $sport_field['id']
            ]);
        }
        return redirect()->route('fields_list');
    }

    public function destroy($id)
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        SportField::where('id', $id)->delete();
        return redirect()->route('fields_list');
    }
}
