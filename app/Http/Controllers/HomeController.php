<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status','1')
        ->orderBy('create_at','asc')
        ->take(5)
        ->get();
        $sliders = Slider::where('status','1')->get();

        Session::put('products',$products);
        return view('pages.home');
    }
}
