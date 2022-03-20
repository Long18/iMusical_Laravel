<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    //
    public function debug(){
        
        $brand = Brand::take(2)->get();
        if($brand){
            Session:: put('brands', $brand);
        }
        return view('debug',['brands' => $brand]);
    }
}
