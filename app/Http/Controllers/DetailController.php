<?php

namespace App\Http\Controllers;

use App\TravelPacks;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug){

        $item = TravelPacks::with(['galleries'])
                ->where('slug', $slug)
                ->firstOrFail();
        return view('pages.detail', [
            'item' => $item
        ]);
    }
}
