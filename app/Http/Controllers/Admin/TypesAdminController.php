<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class TypesAdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('user_id');
        if($admin_id){
            return Redirect::to('admin/dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function all_types()
    {
        $this->AuthLogin();
        //get data from database
        $all_types = Type::get();

        $manager_types = view('admin.sub.all_types')->with('all_types', $all_types);

        //return view
        return view('admin.main.admin_layout')->with('admin.sub.all_types', $manager_types);
    }

    public function add_type()
    {
        $this->AuthLogin();
        $parents = Type::where("status",1)->get();

        //return view
        return view('admin.sub.add_type')
        ->with('parents', $parents);
    }

    public function save_type(Request $request)
    {
        $this->AuthLogin();
        //get data from view
        $data = array();
        $data['type_name'] = $request->val_name_type;
        $data['type_slug'] = $request->val_slug_type;
        $data['type_image_url'] = $request->val_image_url;
        
        $data['type_meta_key'] = $request->val_meta_key;
        $data['type_meta_desc'] = $request->val_meta_desc;

        $data['status'] = $request->val_status_type ? 1 : 0;

        if($request->val_parent_type != "NULL"){
            $data['parent_id'] = $request->val_parent_type;
        }

        $user_id = Session::get('user_id');
        if($user_id){
            $data['create_by'] = $user_id;
        }else{
            return Redirect::to('/admin/logout');
        }

        // insert data in to database
        $inserted = Type::insert($data);

        // jput data into veiew
        if ($inserted) {
            Session::put('messenge', 'Your type was added!!');
        } else {
            Session::put('messenge', 'Your type was not added!!');
        }


        // return view
        return Redirect::to('admin/add-type');
    }

    public function edit_type($type_id)
    {
        $this->AuthLogin();
        //get data from database
        $edit_type = Type::where('type_id', $type_id)
            ->first();
        $parents = Type::where('type_id', '!=', $type_id)
            ->get();
        $creator = $edit_type->getCreator();

        if ($edit_type->count() > 0) {
            //get view
            $manager_types = view('admin.sub.edit_type')
            ->with('edit_type', $edit_type)
            ->with('parents', $parents)
            ->with('creator', $creator);

            //put data into view
            Session::put('messenge', 'Your type was edited!!');
        } else {
            //get view
            $manager_types = view('admin.sub.edit_type');

            //put data into view
            Session::put('messenge', 'Your type was not edited!!');
        }


        //return view
        return view('admin.main.admin_layout')->with('admin.sub.edit_type', $manager_types);
    }

    public function update_type(Request $request, $type_id)
    {
        $this->AuthLogin();
        //get data from view
        $data = array();
        $data['type_name'] = $request->val_name_type;
        $data['type_slug'] = $request->val_slug_type;
        $data['type_image_url'] = $request->val_image_url;
        $data['type_meta_key'] = $request->val_meta_key;
        $data['type_meta_desc'] = $request->val_meta_desc;
        $data['status'] = $request->val_status_type ? 1 : 0;

        if($request->val_parent_type != "NULL"){
            $data['parent_id'] = $request->val_parent_type;
        }

        //update data into database
        $updated = Type::where('type_id', $type_id)->update($data);

        //put data into view
        if ($updated) {
            Session::put('messenge', 'Your type was updated!!');
        } else {
            Session::put('messenge', 'Your type was not updated!!');
        }

        //return view
        return Redirect::to('admin/all-types');
    }

    public function delete_type($type_id)
    {
        $this->AuthLogin();
        //delete data from database
        $deleted = Type::where('type_id', $type_id)->delete();

        //put data into view
        if ($deleted) {
            Session::put('messenge', 'Your type was deleted!!');
        } else {
            Session::put('messenge', 'Your type was not deleted!!');
        }

        //return view
        return Redirect::to('admin/all-types');
    }
}
