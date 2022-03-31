<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();


class PaymentController extends Controller
{
    public function login_payment(){
        return view('client.sub.login');
    }

    public function checkout(){
        return view('client.sub.cart.checkout');
    }
}
