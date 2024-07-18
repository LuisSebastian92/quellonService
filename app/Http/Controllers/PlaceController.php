<?php

namespace App\Http\Controllers;
use App\Models\Place;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $places = Place::all();
       return view('places.index',compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = new Place();
        return view('places.create',compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Place::create($request->all());
        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $place_id)
    {
        $place=Place::find($place_id);
        return view('places.edit',compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $place_id)
    {
        $place=Place::findOrFail($place_id);
        $place->update($request->all());
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $place_id)
    {
        $place = Place::find($place_id);
        $place->delete();
        return redirect()->route('places.index');
    }
}
