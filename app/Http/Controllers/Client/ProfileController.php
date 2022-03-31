<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();


class ProfileController extends Controller
{
    public function AuthLogin()
    {
        $user_id = Session::get('user_id');
        if ($user_id) {
            return Redirect::to('/profile');
        } else {
            return Redirect::to('/login');
        }
    }

    public function add_user(Request $request){
        $data = array();

        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['password'] = md5($request->user_password);

        //When insert, get info of user
        $user_id = User::insertGetId($data);

        Session::put('user_id', $user_id);
        Session::put('user_name', $request->user_name);
        Session::put('user_email', $request->user_email);

        return Redirect::to('/profile');

    }

    public function index(){
        $this->AuthLogin();
        return view('client.sub.profile');
    }
}
