<?php

namespace App\Http\Controllers;
use App\Models\Boat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boats = Boat::all();
        return view('boats.index', compact('boats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $boats = new Boat();
        return view('boats.create', compact('boats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Boat::create($request->all());
        return redirect()->route('boats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $boat_id)
    {
        $boat = Boat::find($boat_id);
        return view('boats.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $boat_id)
    {
        $boat = Boat::find($boat_id);
        return view('boats.edit',compact('boat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $boat_id)
    {
        $boat = Boat::findOrFail($boat_id);
        $boat->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $boat_id)
    {
        $boat = Boat::find($boat_id);
        $boat->delete();
        return redirect()->route('boats.index');
    }
}
