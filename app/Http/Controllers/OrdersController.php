<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use App\Mail\Order;
use App\Models\Invoices;
use App\Models\orders;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
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

        $totalPrice = 0;

        foreach(Session::get("cart") as $item)
        {
            $totalPrice += $item["option"]->price * $item["amount"];
            $orderProduct = new order_products();
            $orderProduct->product_id = $item["product"]->id;
            $orderProduct->order_id = $order->id;
            $orderProduct->option_name = $item["option"]->name;
            $orderProduct->option_price = $item["option"]->price;
            $orderProduct->amount = $item["amount"];
            $orderProduct->save();
        }
        $totalPrice += 4.15;

        $order->total = $totalPrice;


        Session::pull("cart");

        $response = Http::get("https://transaction.digiwallet.nl/ideal/start?ver=4&rtlo=159919&description=SocratesMicrodosing&amount=" . str_replace(".", "", $totalPrice) . "&returnurl=" .  route("success") . "&test=1");

        return redirect(substr($response, 17));
    }

    public function success()
    {
        $pdfName = time();

        $order = orders::where("is_paid", 0)
            ->orderBy("id", "DESC")
            ->with("orderProducts",
                "orderProducts.products")
            ->firstOrFail();

        $order->is_paid = 1;
        $order->save();

        $invoice = new Invoices();
        $invoice->file_name = $pdfName;
        $invoice->order_id = $order->id;
        $invoice->save();

        $totalPrice = 0;
        $orders = [];

        foreach($order->orderProducts as $product)
        {
            $orders[] = $product;
            $totalPrice += $product->option_price * $product->amount;
        }

        $totalPrice += 4.15;

        $data = [
            "products" => $orders,
            "totalPrice" => $totalPrice,
            "user" => $order,
            "invoiceCode" => $pdfName
        ];

        $pdf = PDF::loadView("pdf.order", $data);
        $pdf->setPaper("A4", "portrait");

        $pdf->save("invoices/" . $pdfName .".pdf");

        Mail::to($order->email)->send(new Invoice($pdfName));

        Mail::to("yusufyildiz@live.nl")->send(new Order($data));
        Mail::to("yusufyildiz@live.nl")->send(new Invoice($pdfName));

        return view("user.orders.success");
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
