<?php

namespace App\Http\Controllers;

use App\Models\Productimages;
use App\Models\Productoptions;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $product = new Products();
        $product->name = ucfirst($request->name);
        $product->description = ucfirst($request->description);
        $product->category_id = $request->category_id;
        $this->checkImage($request, $product);
        $product->save();

        return redirect()->route('admin.productcategories.edit', $request->category_id)->with('success', 'Product toegevoegd');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Products::where('id', $id)
            ->with('reviews')
            ->with("productoptions")
            ->with("productimages")
            ->first();
        $productReviewsAverage = 0;

        if(count($product->reviews) > 0)
        {
            foreach($product->reviews as $review)
            {
                $productReviewsAverage += $review->score;
            }

            $productReviewsAverage = $productReviewsAverage / count($product->reviews);
        }

        return view('user.products.show', compact(
            'product',
            'productReviewsAverage'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Products::where('id', $id)
            ->with('productcategories')
            ->with("productoptions")
            ->with("productimages")
            ->first();

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required'
        ]);

        $product = Products::where('id', $id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $this->checkImage($request, $product, true);
        $product->save();

        return redirect()->back()->with('success', 'Product aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Products::destroy($id);
        Productimages::where("product_id", $id)->delete();
        Productoptions::where("product_id", $id)->delete();

        return redirect()->back()->with('success', 'Product verwijderd');
    }

    public function checkImage($request, $product, $edit = false)
    {
        if(!$edit)
        {
            if($request->file('image'))
            {
                $imageName = 'product-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move('img/product/', $imageName);
                $product->image = $imageName;
            }
            else
            {
                $product->image = 'product-default.png';
            }
        }
        else
        {
            if($request->file('image'))
            {
                $imageName = 'product-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move('img/product/', $imageName);
                $product->image = $imageName;
            }
        }
    }
}
