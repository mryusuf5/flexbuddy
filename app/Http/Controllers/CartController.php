<?php

namespace App\Http\Controllers;

use App\Models\Productoptions;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $totalProductsCost = 0;
        if(Session::has('cart'))
        {
            $cartItems = Session::get('cart');
            foreach($cartItems as $index => &$cart)
            {
                $cart['product'] = Products::where('id', $cart['product']->id)->first();

                $totalProductsCost += $cart['amount'] * $cart['option']->price;
            }
        }

        return view('user.carts.index', compact('totalProductsCost'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'amount' => 'required'
        ]);

        Session::get('cart') !== null ? $cart = Session::get('cart') : $cart = [];
        $product = Products::where('id', $request->product_id)->first();
        $option = Productoptions::where("id", $request->product_option)->first();
        $cartItem = [
            'product' => $product,
            'option' => $option,
            'amount' => $request->amount
        ];
        $cart[] = $cartItem;
        Session::put('cart', $cart);

        return redirect()->route('carts.index')->with('success', 'Product added to cart');
    }

    public function destroy($id)
    {
        $cart = Session::get('cart');
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart');
    }
}
