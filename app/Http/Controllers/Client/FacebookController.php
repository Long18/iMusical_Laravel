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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

session_start();
class FacebookController extends Controller
{

    public function login_facebook()
    {
        //Bring user to facebook login page
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        // //Get user data from facebook
        // $provider = Socialite::driver('facebook')->user();
        // //
        // $account = Social::where('provider', 'facebook')
        //     ->where('provider_user_id', $provider->getId())->first();

        // if ($account) {
        //     $account_name = User::where('user_id', $account->user_id)->first();

        //     session()->put('user_name', $account_name->user_name);
        //     session()->put('user_id', $account_name->user_id);
        //     return redirect()->route('client.home')
        //         ->with('message', 'Login success');
        // } else {

        //     $long = new Social([
        //         'provider_user_id' => $provider->getId(),
        //         'provider' => 'facebook',
        //     ]);

        //     $orang = User::where('user_email', $provider->getEmail())->first();

        //     if (!$orang) {
        //         $orang = User::create([
        //             'user_name' => $provider->getName(),
        //             'user_email' => $provider->getEmail(),
        //             'user_password' => '',
        //             'user_status' => 1
        //         ]);
        //     }

        //     $long->login()->associate($orang);
        //     $long->save();

        //     $account_name = User::where('user_id', $account->user)->first();
        //     session()->put('user_name', $account_name->user_name);
        //     session()->put('user_id', $account_name->user_id);

        //     return redirect()->route('client.home')->with('message', 'Login success');
        // }


        try {
            $user = Socialite::driver('facebook')->user();

            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ], [
                'user_name' => $user->getName(),
                'user_email' => $user->getEmail(),
                'password' => Hash::make($user->getName() . '@' . $user->getId())
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
