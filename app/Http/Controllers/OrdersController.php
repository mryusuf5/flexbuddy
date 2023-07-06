<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\order_products;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = orders::with("orderProducts", "orderProducts.products")->get();

        return view("admin.orders.index", compact(
            "orders"
        ));
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'confirm_email' => 'required|same:email',
            'address' => 'required',
            'house_number' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'over18' => 'required'
        ]);

        $order = new orders();
        $order->name = $request->firstname . " " . $request->lastname;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address;
        $order->house_number = $request->house_number;
        $order->country = $request->country;
        $order->zipcode = $request->zipcode;
        $order->city = $request->city;
        $order->is_paid = 0;

        $order->save();

        foreach(Session::get("cart") as $item)
        {
            $orderProduct = new order_products();
            $orderProduct->product_id = $item["product"]->id;
            $orderProduct->order_id = $order->id;
            $orderProduct->amount = $item["amount"];
            $orderProduct->save();
        }

        Session::pull("cart");

        return redirect()->route("home")->with("success", "Order placed");
    }

    /**
     * Display the specified resource.
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
