<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class BrandsAdminController extends Controller
{
    public function all_brands()
    {
        //get data from database
        $all_brands = Type::get();

        $manager_brands = view('admin.sub.all_brands')->with('all_brands', $all_brands);

        //return view
        return view('admin.main.admin_layout')->with('admin.sub.all_brands', $manager_brands);
    }

    public function add_brand()
    {
        $parents = Type::where("status",1)->get();

        //return view
        return view('admin.sub.add_brand')
        ->with('parents', $parents);
    }

    public function save_brand(Request $request)
    {
        //get data from view
        $data = array();
        $data['brand_name'] = $request->val_name_brand;
        $data['brand_slug'] = $request->val_slug_brand;
        $data['brand_image_url'] = $request->val_image_url;
        $data['parent_id'] = $request->val_parent_brand;
        $data['brand_meta_key'] = $request->val_meta_key;
        $data['brand_meta_desc'] = $request->val_meta_desc;
        
        $data['status'] = $request->val_status_brand ? 1 : 0;

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
            Session::put('messenge', 'Your brand was added!!');
        } else {
            Session::put('messenge', 'Your brand was not added!!');
        }


        // return view
        return Redirect::to('admin/add-brand');
    }

    public function edit_brand($brand_id)
    {
        //get data from database
        $edit_brand = Type::where('brand_id', $brand_id)
            ->first();
        $parents = Type::where('brand_id', '!=', $brand_id)
            ->get();
        $creator = $edit_brand->getCreator();

        if ($edit_brand->count() > 0) {
            //get view
            $manager_brands = view('admin.sub.edit_brand')
            ->with('edit_brand', $edit_brand)
            ->with('parents', $parents)
            ->with('creator', $creator);

            //put data into view
            Session::put('messenge', 'Your brand was edited!!');
        } else {
            //get view
            $manager_brands = view('admin.sub.edit_brand');

            //put data into view
            Session::put('messenge', 'Your brand was not edited!!');
        }


        //return view
        return view('admin.main.admin_layout')->with('admin.sub.edit_brand', $manager_brands);
    }

    public function update_brand(Request $request, $brand_id)
    {
        //get data from view
        $data = array();
        $data['brand_name'] = $request->val_name_brand;
        $data['brand_slug'] = $request->val_slug_brand;
        $data['brand_image_url'] = $request->val_image_url;
        $data['parent_id'] = $request->val_parent_brand;
        $data['brand_meta_key'] = $request->val_meta_key;
        $data['brand_meta_desc'] = $request->val_meta_desc;
        $data['status'] = $request->val_status_brand ? 1 : 0;

        //update data into database
        $updated = Type::where('brand_id', $brand_id)->update($data);

        //put data into view
        if ($updated) {
            Session::put('messenge', 'Your brand was updated!!');
        } else {
            Session::put('messenge', 'Your brand was not updated!!');
        }

        //return view
        return Redirect::to('admin/all-brands');
    }

    public function delete_brand($brand_id)
    {
        //delete data from database
        $deleted = Type::where('brand_id', $brand_id)->delete();

        //put data into view
        if ($deleted) {
            Session::put('messenge', 'Your brand was deleted!!');
        } else {
            Session::put('messenge', 'Your brand was not deleted!!');
        }

        //return view
        return Redirect::to('admin/all-brands');
    }
}
