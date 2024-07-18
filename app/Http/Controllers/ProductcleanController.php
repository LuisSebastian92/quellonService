<?php

namespace App\Http\Controllers;
use App\Models\Productclean;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductcleanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productcleans = Productclean::all();
        return view('productcleans.index',compact('productcleans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productcleans = new Productclean;
        return view('productcleans.create',compact('productcleans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Productclean::create($request->all());
        return redirect()->route('productcleans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $productclean_id)
    {
        $productclean = Productclean::find($productclean_id);
        return view('productcleans.show',compact('productclean'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $productclean_id)
    {
        $productclean = Productclean::find($productclean_id);
        return view('productcleans.edit',compact('productclean'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $productclean_id)
    {
        $productclean = Productclean::findOrFail($productclean_id);
        $productclean->update($request->all());
        return redirect()->route('productcleans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $productclean_id)
    {
        $productclean = Productclean::find($productclean_id);
        $productclean->delete();
        return redirect()->route('productcleans.index');
    }
}
