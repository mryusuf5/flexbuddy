<?php

namespace App\Http\Controllers;

use App\Models\Productoptions;
use Illuminate\Http\Request;

class ProductoptionsController extends Controller
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
            "name" => "required",
            "price" => "required"
        ]);

        $option = new Productoptions();
        $option->name = $request->name;
        $option->price = $request->price;
        $option->product_id = $request->product_id;
        $option->save();

        return redirect()->route("admin.products.edit", $request->product_id)->with("success", "Product aangepast");
    }

    /**
     * Display the specified resource.
     */
    public function show(Productoptions $productoptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productoptions $productoptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productoptions $productoptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Productoptions::destroy($id);

        return redirect()->back()->with("success", "Optie verwijderd");
    }
}
