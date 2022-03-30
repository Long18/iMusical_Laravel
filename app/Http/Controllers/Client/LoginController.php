<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

session_start();
class LoginController extends Controller
{
    public function AuthLogin()
    {
        $user_id = Session::get('user_id');
        if ($user_id) {
            return redirect()->route('client.home');
        } else {
            return redirect()->route('client.sub.login')->send();
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

        // if (Session::get('user_id')) {
        //     return Redirect::to('/');
        // }
        return view('client.sub.login')
        ->with('newProducts',$newProducts)
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

        $result = false;
        if ($login) {
            foreach ($login->getRole() as $user_role) {
                $role = $user_role->getRole();
                if ($role->role_name != 'admin') {
                    $result = true;
                    break;
                }
            }
        }

        if ($result) {
            session()->put('user_email', $user_email);
            session()->put('user_name', $login->user_name);
            session()->put('user_id', $login->user_id);
            return Redirect::to('/profile');
        } else {
            return Redirect::to('/login');
            session()->put('message', 'Login failed');
        }
    }

    public function logout()
    {
        //$this->AuthLogin();
        session()->put('user_id', null);
        session()->put('user_name', null);
        session()->put('user_email', null);
        return Redirect::to('/login');
    }

    public function login_facebook()
    {
        //Bring user to facebook login page
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        //Get user data from facebook
        $provider = Socialite::driver('facebook')->user();
        //
        $account = Social::where('provider', 'facebook')
            ->where('provider_user_id', $provider->getId())->first();

        if ($account) {
            $account_name = User::where('user_id', $account->user_id)->first();

            session()->put('user_name', $account_name->user_name);
            session()->put('user_id', $account_name->user_id);
            return redirect()->route('client.home')
                ->with('message', 'Login success');
        } else {

            $long = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook',
            ]);

            $orang = User::where('user_email', $provider->getEmail())->first();

            if (!$orang) {
                $orang = User::create([
                    'user_name' => $provider->getName(),
                    'user_email' => $provider->getEmail(),
                    'user_password' => '',
                    'user_status' => 1
                ]);
            }

            $long->login()->associate($orang);
            $long->save();

            $account_name = User::where('user_id', $account->user)->first();
            session()->put('user_name', $account_name->user_name);
            session()->put('user_id', $account_name->user_id);

            return redirect()->route('client.home')->with('message', 'Login success');
        }
    }
}
