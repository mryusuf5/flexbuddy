<h1>Nieuwe bestelling van {{$orderInfo["user"]["name"]}}</h1>
<div><h2>Klant gegevens:</h2></div>
<div><h3>Adres:</h3>{{$orderInfo["user"]["address"] . " " . $orderInfo["user"]["house_number"]}}</div>
<div><h3>Postcode en woonplaats:</h3>{{$orderInfo["user"]["zipcode"] . " " . $orderInfo["user"]["city"]}}</div>
<div><h3>Email:</h3>{{$orderInfo["user"]["email"]}}</div>
<div><h3>Tel. nummer:</h3>{{$orderInfo["user"]["phone_number"]}}</div>
<hr>
<h2>Bestelde producten</h2>
<ul>
    @foreach($orderInfo["products"] as $products)
        <li>{{$products->amount}}x {{$products->products[0]->name . " " . $products->option_name}} &euro;{{$products->amount * $products->option_price}}</li>
    @endforeach
</ul>
<hr>
<div><h3>Totaal betaald:</h3> &euro;{{$orderInfo["totalPrice"]}}</div>
<div><h3>Factuur nummer:</h3>{{$orderInfo["invoiceCode"]}}</div>
