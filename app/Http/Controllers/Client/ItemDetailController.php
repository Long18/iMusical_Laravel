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
    public function get_item_detail($product_id)
    {
        //get product from data base
        $item= Product::where('product_id',$product_id)->get();

        $manager_products = view('client.sub.item_detail')->with('item_detail', $item);
        return view('client.sub.home')->with('client.sub.item_detail', $manager_products);
    }
}
