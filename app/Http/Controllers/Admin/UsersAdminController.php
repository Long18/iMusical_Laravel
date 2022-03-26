<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class UsersAdminController extends Controller
{
    public function all_users()
    {
        //get data from database
        $all_users = User::get();

        $manager_users = view('admin.sub.all_users')->with('all_users', $all_users);

        //return view
        return view('admin.main.admin_layout')->with('admin.sub.all_users', $manager_users);
    }

    // public function add_user()
    // {
    //     $parents = User::where("status",1)->get();

    //     //return view
    //     return view('admin.sub.add_user')
    //     ->with('parents', $parents);
    // }

    public function add_user_role($user_id)
    {
        $roles = Role::where("status", 1)->get();

        //return view
        return view('admin.sub.add_user_role')
            ->with("user_id", $user_id)
            ->with('roles', $roles);
    }

    // public function save_user(Request $request)
    // {
    //     //get data from view
    //     $data = array();
    //     $data['user_name'] = $request->val_name_user;
    //     $data['user_email'] = $request->val_email_user;
    //     $data['create_at'] = $request->val_crate_at;
    //     $data['user_name'] = $request->val_name_user;
    //     $data['status'] = $request->val_status_user ? 1 : 0;

    //     // $user_id = Session::get('user_id');
    //     // if($user_id){
    //     //     $data['create_by'] = $user_id;
    //     // }else{
    //     //     return Redirect::to('/admin/logout');
    //     // }

    //     // insert data in to database
    //     $inserted = User::insert($data);

    //     // jput data into veiew
    //     if ($inserted) {
    //         Session::put('messenge', 'Your user was added!!');
    //     } else {
    //         Session::put('messenge', 'Your user was not added!!');
    //     }


    //     // return view
    //     return Redirect::to('admin/add-user');
    // }

    public function edit_user($user_id)
    {
        //get data from database
        $edit_user = User::where('user_id', $user_id)
            ->first();

        if ($edit_user->count() > 0) {
            //get view
            $manager_users = view('admin.sub.edit_user')
                ->with('edit_user', $edit_user)
                ->with('user_roles', $edit_user->getAllRoles());

            //put data into view
            Session::put('messenge', 'Your user was edited!!');
        } else {
            //get view
            $manager_users = view('admin.sub.edit_user');

            //put data into view
            Session::put('messenge', 'Your user was not edited!!');
        }


        //return view
        return view('admin.main.admin_layout')
            ->with('admin.sub.edit_user', $manager_users);
    }

    public function edit_user_role($role_id, $user_id)
    {
        //get data from database
        $edit_user_role = UserRole::where('user_id', $user_id)
            ->where('role_id', $role_id)
            ->first();

        if ($edit_user_role) {
            //get view
            $manager_users = view('admin.sub.edit_user_role')
                ->with('user_role', $edit_user_role);

            //put data into view
            Session::put('messenge', 'Role was edited!!');
        } else {
            //get view
            $manager_users = view('admin.sub.edit_user_role');

            //put data into view
            Session::put('messenge', 'Role was not edited!!');
        }


        //return view
        return view('admin.main.admin_layout')
            ->with('admin.sub.edit_user_role', $manager_users);
    }

    public function update_user(Request $request, $user_id)
    {
        //get data from view
        $data = array();
        $data['user_name'] = $request->val_name_user;
        $data['status'] = $request->val_status_user ? 1 : 0;

        if (Session::get('user_email') != $request->val_email_user) {
            $data['user_email'] = $request->val_email_user;
            $data['email_verified_at'] = null;
        }

        //update data into database
        $updated = User::where('user_id', $user_id)->update($data);

        //put data into view
        if ($updated) {
            Session::put('messenge', 'Your user was updated!!');
        } else {
            Session::put('messenge', 'Your user was not updated!!');
        }

        //return view
        return Redirect::to('admin/all-users');
    }

    public function update_user_role(Request $request, $role_id, $user_id)
    {
        //get data from view
        $data = array();
        $data['user_id'] = $user_id;
        $data['role_id'] = $request->val_user_role;
        $data['end_at'] = $request->val_end_at;
        $data['status'] = $request->val_status_user_role ? 1 : 0;

        //update data into database
        $updated = UserRole::where('user_id', $user_id)
            ->where('role_id', $role_id)
            ->update($data);

        //put data into view
        if ($updated) {
            Session::put('messenge', 'That User Role was updated!!');
        } else {
            Session::put('messenge', 'That User Role was not updated!!');
        }

        //return view
        return Redirect::to('admin/edit-user/' . $user_id);
    }

    public function save_user_role(Request $request, $user_id)
    {
        //get data from view
        $data = array();
        $data['user_id'] = $user_id;
        $data['role_id'] = $request->val_user_role;
        $data['end_at'] = $request->val_end_at;
        $data['status'] = $request->val_status_user_role ? 1 : 0;

        //update data into database
        $updated = UserRole::updateOrCreate($data);
        //put data into view
        if ($updated) {
            Session::put('messenge', 'That User Role was Added!!');
        } else {
            Session::put('messenge', 'That User Role was not Added!!');
        }

        //return view
        return Redirect::to('admin/edit-user/' . $user_id);
    }

    public function delete_user($user_id)
    {
        //delete data from database
        $deleted = User::where('user_id', $user_id)->delete();

        //put data into view
        if ($deleted) {
            Session::put('messenge', 'Your user was deleted!!');
        } else {
            Session::put('messenge', 'Your user was not deleted!!');
        }

        //return view
        return Redirect::to('admin/all-users');
    }

    public function delete_user_role($role_id, $user_id)
    {
        //delete data from database
        $deleted = UserRole::where('user_id', $user_id)
        ->where('role_id', $role_id)
        ->delete();

        //put data into view
        if ($deleted) {
            Session::put('messenge', 'Your user role was deleted!!');
        } else {
            Session::put('messenge', 'Your user role was not deleted!!');
        }

        //return view
        return Redirect::to('admin/edit-user/' . $user_id);
    }
}
