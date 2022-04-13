<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Type;
use App\Models\TypeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ItemDetailController extends Controller
{
    public function get_item_detail($product_id)
    {

        $product = Product::where('product_id', $product_id)
            ->orderBy('created_at', 'asc')
            ->first();
            
        $images = $product->getAllImg();

        $typeDetails = TypeDetail::where('product_id', $product_id)
        ->get();

        return view('client.sub.item_detail')
            ->with('product', $product)
            ->with('images', $images)
            ->with('typeDetails', $typeDetails);
    }
}
