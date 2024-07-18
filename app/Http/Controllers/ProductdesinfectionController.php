<?php

namespace App\Http\Controllers;
use App\Models\Productdesinfection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductdesinfectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productdesinfections = productdesinfection::all();
        return view('productdesinfections.index',compact('productdesinfections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productdesinfections = new Productdesinfection;
        return view('productdesinfections.create',compact('productdesinfections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Productdesinfection::create($request->all());
        return redirect()->route('productdesinfections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $productdesinfection_id)
    {
        $productdesinfection = Productdesinfection::find($productdesinfection_id);
        return view('productdesinfections.show',compact('productdesinfection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $productdesinfection_id)
    {
        $productdesinfection = Productdesinfection::find($productdesinfection_id);
        return view('productdesinfections.edit',compact('productdesinfection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $productdesinfection_id)
    {
        $productdesinfection = Productdesinfection::findOrFail($productdesinfection_id);
        $productdesinfection->update($request->all());
        return redirect()->route('productdesinfections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $productdesinfection_id)
    {
        $productdesinfection = Productdesinfection::find($productdesinfection_id);
        $productdesinfection->delete();
        return redirect()->route('productdesinfections.index');
    }
}
