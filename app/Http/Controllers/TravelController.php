<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPacks;
use App\Countries;
class TravelController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $items = TravelPacks::where('title', 'LIKE', '%'.$request->search.'%')->with([
                'galleries'
            ])->get();    
        }else {
            $items = TravelPacks::with([
                'galleries'
            ])->get();
        }
        return view('pages.travel', [
            'items' => $items
        ]);
    }
}
