<?php

namespace App\Http\Controllers;

use App\Models\Productimages;
use Illuminate\Http\Request;

class ProductimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => "required"
        ]);

        $image = new Productimages();
        $imageName = 'product-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('img/product/', $imageName);
        $image->image = $imageName;
        $image->product_id = $request->product_id;
        $image->save();

        return redirect()->back()->with("success", "Afbeelding opgeslagen");
    }

    /**
     * Display the specified resource.
     */
    public function show(Productimages $productimages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productimages $productimages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productimages $productimages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Productimages::destroy($id);

        return redirect()->back()->with("success", "Afbeelding verwijderd");
    }
}
