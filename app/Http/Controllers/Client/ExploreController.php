<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Slider;
use App\Models\Type;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        //get slider for home page
        $brands = Brand::where('status', '1')->get();

        //get top 10 Top seller product

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

        return view('client.sub.explore')
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('productsImage', $productsImage);
    }
}
