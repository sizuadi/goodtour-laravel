<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPacksRequest;
use App\TravelPacks;
use App\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPacks::with(['countries'])->get();

        return view('pages.admin.travel-packs.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Countries::all();
         return view("pages.admin.travel-packs.create",[
             'countries' => $countries
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPacksRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TravelPacks::create($data);
        return redirect()->route('travel-packs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TravelPacks::findOrFail($id);

        return view('pages.admin.travel-packs.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPacksRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = TravelPacks::findOrFail($id);
        $item->update($data);
        return redirect()->route('travel-packs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TravelPacks::findOrFail($id);
        $item->delete();

        return redirect()->route('travel-packs.index');
    }
}
