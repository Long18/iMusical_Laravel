<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Type;
use App\Models\Slider;
use App\Models\TypeDetail;

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    //
    public function debug(){
        
        $brand = Brand::get();
        if($brand){
            Session:: put('brands', $brand);
        }
        $brand = User::get();
        if($brand){
            Session:: put('User', $brand);
        }
        $brand = Cart::get();
        if($brand){
            Session:: put('Cart', $brand);
        }
        $brand = Order::get();
        if($brand){
            Session:: put('Order', $brand);
        }
        $brand = Product::get();
        if($brand){
            Session:: put('Product', $brand);
        }
        $brand = Type::get();
        if($brand){
            Session:: put('Type', $brand);
        }
        $brand = Slider::get();
        if($brand){
            Session:: put('Slider', $brand);
        }
        $brand = TypeDetail::get();
        if($brand){
            Session:: put('TypeDetail', $brand);
        }
        return view('debug');
    }
}
