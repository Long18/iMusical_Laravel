<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class AdminController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin/dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index()
    {
        if(Session::get('admin_id')){
            return Redirect::to('/admin/dashboard');
        }
        return view('admin.main.admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.sub.dashboard');
    }

    public function dashboard(Request $request){
        $user_email = $request->admin_email;
        $user_password =md5($request->admin_password);

        $user = User::where('user_email', $user_email)
        ->where('password', $user_password)
        ->first();
        $result = false;
        if($user){
            foreach($user->getRoles() as $user_role){
                $role = $user_role->getRole();
                if($role->role_name != 'guest'){
                    $result = true;
                    break;
                }
            }
        }



        if($result){
            Session::put('admin_name',$user->user_name);
            Session::put('admin_email',$user_email);
            Session::put('admin_id',$user->user_id);
            return Redirect::to('/admin/dashboard');
        }else{
            Session::put('message',"Wrong!! You don't have permission to access this page");
            Session::put('admin_email',$user_email);
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
