<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ItemDetailController extends Controller
{
    public function get_item_detail($product_id)
    {

        //get top 10 newest product
        $newProducts = Product::where('status', '1')
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->get();


        //get top 10 Top seller product
        // return obj(product_id, total)
        $topSellers = OrderDetail::groupBy('product_id')
            ->selectRaw('product_id, sum(order_detail_quantity) as total')
            ->orderBy('total', 'desc')
            ->get();

        //get categories
        $categories = Type::where('status', 1)
            ->whereNULL('parent_id')
            ->get();


        $products = Product::where('status', '1')
            ->orderBy('created_at', 'asc')
            ->get();

        //get product from data base
        $item = Product::where('product_id', $product_id)->get();

        $manager_products = view('client.sub.item_detail')
            ->with('newProducts', $newProducts)
            ->with('topSellers', $topSellers)
            ->with('categories', $categories)
            ->with('item_detail', $item)
            ->with('products', $products);
        return view('client.sub.home')->with('client.sub.item_detail', $manager_products);
    }
}
