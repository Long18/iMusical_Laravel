<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Type;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

session_start();
class GoogleController extends Controller
{
    public function login_google()
    {
        //Bring user to google login page
        return Socialite::driver('google')->redirect();
    }

    public function callback_google()
    {
        // try {

        //     $user = Socialite::driver('google')->user();

        //     $finduser = User::where('google_id', $user->id)->first();

        //     if ($finduser) {

        //         Auth::login($finduser);

        //         return redirect()->intended('dashboard');
        //     } else {
        //         $newUser = User::create([
        //             'user_name' => $user->name,
        //             'user_email' => $user->email,
        //             'google_id' => $user->id,
        //             'password' => '',
        //         ]);

        //         Auth::login($newUser);

        //         // session()->put('user_id', $finduser->user_id);
        //         // session()->put('user_email', $finduser->user_email);
        //         // session()->put('user_name', $finduser->user_name);

        //         return Redirect::to('/');
        //     }
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }

        //Get user data from facebook
        $users = Socialite::driver('google')->user();
        //
        $authUser = $this->findOrCreateUser($users, 'google');
        $account_name = User::where('user_id', $authUser->user_id)->first();

        session()->put('user_id', $authUser->user_id);
        session()->put('user_name', $authUser->user_name);

        return redirect()->route('client.home')->with('message', 'Login success');
    }

    public function findOrCreateUser($users, $social)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if ($authUser) {
            return $authUser;
        }


        $long = new Social([
            'provider_user_id' => $users->id,
            'provider' => $social,
        ]);

        $exits = User::where('user_email', $users->email)->first();

        if (!$exits) {

            $exits = User::create([
                'user_name' => $users->user_name,
                'user_email' => $users->user_email,
                'password' => '',
                'status' => 1
            ]);
        }

        $long->login()->associate($exits);
        $long->save();

        $account_name = User::where('user_id', $exits->user_id)->first();
        session()->put('user_id', $account_name->user_id);
        session()->put('user_name', $account_name->user_name);

        return Redirect::to('/payment')->with('message', 'Login success');
    }
}
