<?php

namespace App\Http\Controllers;

use App\Countries;
use App\TravelPacks;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request, $country){
        $c = Countries::where('countries_id', '=',$country)
                ->firstOrFail();
        $items = TravelPacks::where('countries_id', '=', $country)->paginate(10);
        return view('pages.country', [
            'items' => $items,
            'c' => $c
        ]);
    }
}
