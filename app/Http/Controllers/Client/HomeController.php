<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Slider;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    public function index()
    {
        //get slider for home page
        $sliders = Slider::where('status', '1')->get();

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

        // get product
        $products = Product::where('status', '1')
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->get();

        //get top 10 newest product image
        $productsImage = ProductImages::where('status', '1')->get();

        return view('client.sub.home')
            ->with('newProducts', $newProducts)
            ->with('sliders', $sliders)
            ->with('topSellers', $topSellers)
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('productsImage', $productsImage);
    }

    public function contact()
    {
        return view('client.sub.contact');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $sliders = Slider::where('status', '1')->get();

        $newProducts = Product::where('status', '1')
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->get();

        $topSellers = OrderDetail::groupBy('product_id')
            ->selectRaw('product_id, sum(order_detail_quantity) as total')
            ->orderBy('total', 'desc')
            ->get();

        $categories = Type::where('status', 1)
            ->whereNULL('parent_id')
            ->get();

        $products = Product::where('status', '1')
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->get();

        $productsImage = ProductImages::where('status', '1')
        ->get();

        $search = Product::where('product_name', 'like', '%' . $keyword . '%')
            ->orWhere('product_detail', 'like', '%' . $keyword . '%')
            ->get();

        return view('client.sub.search')
            ->with('newProducts', $newProducts)
            ->with('sliders', $sliders)
            ->with('topSellers', $topSellers)
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('productsImage', $productsImage)
            ->with('search', $search);

    }
}
