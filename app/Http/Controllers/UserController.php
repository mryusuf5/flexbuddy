<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\Productcategories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $productCategories = Productcategories::all();
        $orders = orders::all();

        return view("admin.index", compact(
            "products",
            "productCategories",
            "orders"
        ));
    }

    public function loginView()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('name', $request->name)->first();

        if(!$user)
        {
            return redirect()->route('loginView')->with('error', 'Naam is fout');
        }

        if($user->password !== $request->password)
        {
            return redirect()->route('loginView')->with('error', 'Wachtwoord is fout');
        }

        Session::put('admin', $user);
        return redirect()->route('home');
    }

    public function logout()
    {
        Session::pull('admin');

        return redirect()->route('home');
    }
}
