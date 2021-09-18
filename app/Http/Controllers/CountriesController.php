<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        $countries = Country::all();

        return view('countries/list', compact('countries'));
    }

    public function create()
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        return view('countries/create');
    }

    public function store(Request $request)
    {
        Country::create([
            'name' => $request['name'],
            'visible' => $request['visible']
        ]);
        return redirect()->route('countries_list');
    }

    public function destroy($id)
    {
        if(auth()->user()->role->name == 'user'){
            return redirect('home')->withErrors('Your account does not have privilages to see this route');
        }
        Country::where('id', $id)->delete();
        return redirect()->route('countries_list');
    }
}
