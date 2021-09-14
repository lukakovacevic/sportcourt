<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\SportField;
use App\Models\UserFields;
use Illuminate\Http\Request;

class UserFieldsController extends Controller
{
    public function index()
    {
        $sport_fields = UserFields::with('field')->where('user_id', auth()->user()->id)->get();
        $cities = City::where('country_id', auth()->user()->country_id)->get();

        return view('userfields/userfields', compact(['sport_fields', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserFields::create([
            'user_id' => auth()->user()->id,
            'field_id' => $request['field_id'],
        ]);
        return redirect()->route('user_fields');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserFields::where('field_id', $id)->delete();
        return redirect()->route('user_fields');
    }

    public function getFieldsByCity($id)
    {
        $fields = SportField::where('city_id', $id)->get();
        
        return $fields;
    }
}
