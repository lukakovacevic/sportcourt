<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        $cities = City::all();
        return view('cities/list', compact('cities'));
    }

    public function create()
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        $countries = Country::all();
        return view('cities/create', compact('countries'));
    }

    public function store(Request $request)
    {
        City::create([
            'name' => $request['name'],
            'country_id' => $request['country_id']
        ]);
        return redirect()->route('cities_list');
    }

    public function destroy($id)
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        City::where('id', $id)->delete();
        return redirect()->route('cities_list');
    }

    public function getCitiesByCountry($id)
    {
        $cit = City::where('country_id', $id)->get();
        return $cit;
    }
}
