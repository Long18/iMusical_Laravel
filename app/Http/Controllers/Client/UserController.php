<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user($user_id)
    {

        //Get user
        $user = User::where('user_id', $user_id)->get();

        //get top 10 newest product
        $newProducts = Product::where('created_by', $user_id)
            ->orderBy('created_at', 'asc')
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


        //get top 10 newest product image
        $productsImage = ProductImages::where('status', '1')->get();


        return view('client.sub.user')
            ->with('user', $user)
            ->with('newProducts', $newProducts)
            ->with('topSellers', $topSellers)
            ->with('categories', $categories)
            ->with('productsImage', $productsImage);
    }
}
