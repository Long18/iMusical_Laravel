<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ItemDetailController extends Controller
{
    public function index()
    {
        //get product from data base
        $all_products = Product::where('status','1')
        ->orderBy('create_at','asc')
        ->take(10)
        ->get();

        $manager_products = view('client.sub.item_detail')->with('item_detail', $all_products);
        return view('client.sub.home')->with('client.sub.item_detail', $manager_products);
    }
}
