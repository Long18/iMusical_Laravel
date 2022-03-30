<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

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
        // if (Session::get('user_id')) {
        //     return Redirect::to('/');
        // }
        return view('client.sub.login');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $user_email = $data['user_email'];
        $user_password = md5($data['user_password']);

        $login = User::where('user_email', $user_email)
            ->where('user_password', $user_password)->first();

        $login_count = $login->count();

        if ($login_count) {
            Session::put('user_id', $login->user_id);
            Session::put('user_email', $user_email);
            Session::put('user_name', $login->user_name);
            return redirect()->route('client.profile');
        } else {
            return redirect()->route('client.login')->with('message', 'Login failed');
        }
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
            Session::put('user_name', $account_name->user_name);
            Session::put('user_id', $account_name->user_id);
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
            Session::put('user_name', $account_name->user_name);
            Session::put('user_id', $account_name->user_id);

            return redirect()->route('client.home')->with('message', 'Login success');
        }
    }
}
