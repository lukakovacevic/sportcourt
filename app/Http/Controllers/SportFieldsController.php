<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\SportField;
use App\Models\SportFieldType;
use App\Models\UserSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SportFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sport_fields = SportField::all();

        return view('fields/list', compact('sport_fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::with(['cities'])->get();
        $types = SportFieldType::all();

        return view('fields/create', compact(['countries', 'types']));
    }

    public function show($id)
    {
        $now = Carbon::now();
        $now_time = $now->toDateString();
        $field = SportField::where('id', $id)->first();
        $user_times = UserSchedule::where('user_id', auth()->user()->id)->where('sport_field_id', $id)->whereDay('created_at', now()->day)->get();

        return view('fields/show', compact(['field', 'now_time', 'user_times']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SportField::create([
            'address' => $request['address'],
            'longitude' => $request['longitude'],
            'latitude' => $request['latitude'],
            'city_id' => $request['city_id'],
            'type_id' => $request['type_id'],
            'country_id' => $request['country_id'],
            'number_of_courts' => $request['number_of_courts'],
        ]);
        return redirect()->route('fields_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SportField::where('id', $id)->delete();
        return redirect()->route('fields_list');
    }
}
