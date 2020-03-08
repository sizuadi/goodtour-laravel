<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleriesRequest;
use App\Galleries;
use App\TravelPacks;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Galleries::with(['travel_packs'])->get();

        return view('pages.admin.galleries.index',[
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
        $travel_packs = TravelPacks::all();

        return view('pages.admin.galleries.create',[
            'travel_packs' => $travel_packs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleriesRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/galleries', 'public'
        );

        Galleries::create($data);
        return redirect()->route('galleries.index');
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
        $item = Galleries::findOrFail($id);
        $travel_packs = TravelPacks::all();

        return view('pages.admin.galleries.edit',[
            'item' => $item,
            'travel_packs' => $travel_packs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleriesRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/galleries', 'public'
        );
        $item = Galleries::findOrFail($id);
        $item->update($data);

        return redirect()->route('galleries.index');

    }

    /**
     * Remove the specified resource from storage.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Galleries::findOrFail($id);

        $item->delete();

        return redirect()->route('galleries.index');
    }
}
