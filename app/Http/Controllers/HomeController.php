<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPacks;
use App\Countries;
use App\Comments;
use App\Transactions;
use App\User;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = TravelPacks::with([
            'galleries'
        ])->get();
        $countries = Countries::all();
        return view('pages.home', [
            'items' => $items,
            'countries' => $countries,
            'transaction_success' => Transactions::where('transaction_status', 'SUCCESS')->count(),
            'users' => User::where('roles', 'USER')->count(),
            'travel_packs' => TravelPacks::count()
        ]);
        
    }
}
