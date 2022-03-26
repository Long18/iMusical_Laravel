<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class BrandsAdminController extends Controller
{
    public function all_brands()
    {
        //get data from database
        $all_brands = Brand::get();

        $manager_brands = view('admin.sub.all_brands')->with('all_brands', $all_brands);

        //return view
        return view('admin.main.admin_layout')->with('admin.sub.all_brands', $manager_brands);
    }

    public function add_brand()
    {
        $parents = Brand::where("status",1)->get();

        //return view
        return view('admin.sub.add_brand')
        ->with('parents', $parents);
    }

    public function save_brand(Request $request)
    {
        //get data from view
        $data = array();
        $data['brand_name'] = $request->val_name_brand;
        $data['status'] = $request->val_status_brand ? 1 : 0;

        // $user_id = Session::get('user_id');
        // if($user_id){
        //     $data['create_by'] = $user_id;
        // }else{
        //     return Redirect::to('/admin/logout');
        // }

        // insert data in to database
        $inserted = Brand::insert($data);

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
        $edit_brand = Brand::where('brand_id', $brand_id)
            ->first();

        if ($edit_brand->count() > 0) {
            //get view
            $manager_brands = view('admin.sub.edit_brand')
            ->with('edit_brand', $edit_brand);

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
        $data['status'] = $request->val_status_brand ? 1 : 0;

        //update data into database
        $updated = Brand::where('brand_id', $brand_id)->updateOrCreate($data);

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
        $deleted = Brand::where('brand_id', $brand_id)->delete();

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
