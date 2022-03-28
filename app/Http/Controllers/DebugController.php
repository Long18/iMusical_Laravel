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
use Exception;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    //
    public function debug(){
        try{
            $carts = Cart::get();
            if($carts){
                Session::put('carts',$carts);
                Session::save();
            }
        }catch(Exception $e){

        }

        return view('debug');
    }
}
