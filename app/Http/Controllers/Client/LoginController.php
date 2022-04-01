<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();
class LoginController extends Controller
{
    public function AuthLogin()
    {
        $user_id = Session::get('user_id');
        if ($user_id) {
            return Redirect::to('/');
        } else {
            return Redirect::to('/login')->send();
        }
    }
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

        if (Session::get('user_id')) {
            return Redirect::to('/');
        }
        return view('client.sub.login')
            ->with('newProducts', $newProducts)
            ->with('sliders', $sliders)
            ->with('topSellers', $topSellers)
            ->with('categories', $categories)
            ->with('products', $products);
    }

    public function login(Request $request)
    {
        $user_email = $request->user_email;
        $user_password = md5($request->user_password);

        $login = User::where('user_email', $user_email)
            ->where('password', $user_password)
            ->first();

        if ($login) {
            session()->put('user_email', $user_email);
            session()->put('user_name', $login->user_name);
            session()->put('user_id', $login->user_id);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login');
            session()->put('message', 'Login failed');
        }
    }

    public function logout()
    {
        $this->AuthLogin();
        session()->put('user_id', null);
        session()->put('user_name', null);
        session()->put('user_email', null);
        return Redirect::to('/login');
    }
}
