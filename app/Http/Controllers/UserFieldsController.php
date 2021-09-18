<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFieldRequest;
use App\Models\City;
use App\Models\FieldTypes;
use App\Models\SportField;
use App\Models\UserFields;

class UserFieldsController extends Controller
{
    public function index()
    {
        $sport_fields = UserFields::with('field')->where('user_id', auth()->user()->id)->get();
        $cities = City::where('country_id', auth()->user()->country_id)->get();

        return view('userfields/userfields', compact(['sport_fields', 'cities']));
    }

    public function store(StoreUserFieldRequest $request)
    {
        UserFields::create([
            'user_id' => auth()->user()->id,
            'field_id' => $request['field_id'],
        ]);
        return redirect()->route('user_fields');
    }

    public function destroy($id)
    {
        UserFields::where('user_id', auth()->user()->id)->where('field_id', $id)->delete();
        return redirect()->route('user_fields');
    }

    public function getFieldsByCity($id)
    { 
        $fields = SportField::where('city_id', $id)->get();
        
        return $fields;
    }

    public function getTypeByField($id)
    {
        $types = FieldTypes::with('type')->where('field_id', $id)->get()->pluck('type');
        
        return $types;
    }
}
