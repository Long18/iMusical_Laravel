<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SlidersAdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('user_id');
        if ($admin_id) {
            return Redirect::to('admin/dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function all_sliders()
    {
        $this->AuthLogin();
        //get data from database
        $all_sliders = Slider::get();

        $manager_sliders = view('admin.sub.all_sliders')->with('all_sliders', $all_sliders);

        //return view
        return view('admin.main.admin_layout')->with('admin.sub.all_sliders', $manager_sliders);
    }

    public function add_slider()
    {
        $this->AuthLogin();
        //return view
        return view('admin.sub.add_slider');
    }

    public function save_slider(Request $request)
    {
        $this->AuthLogin();
        //get data from view
        $data = array();
        $data['slider_name'] = $request->val_name_slider;
        $data['slider_url'] = $request->val_url_slider;
        $data['slider_position'] = $request->val_position_slider;
        $data['slider_img_url'] = $request->val_image_url;

        $data['status'] = $request->val_status_slider ? 1 : 0;


        $user_id = Session::get('user_id');
        if (isset($user_id)) {
            $data['created_by'] = $user_id;
        } else {
            return Redirect::to('/admin/logout');
        }

        // insert data in to database
        $inserted = Slider::insert($data);

        // jput data into veiew
        if ($inserted) {
            Session::put('messenge', 'Your slider was added!!');
        } else {
            Session::put('messenge', 'Your slider was not added!!');
        }


        // return view
        return Redirect::to('admin/all-sliders');
    }

    public function edit_slider($slider_id)
    {
        $this->AuthLogin();
        //get data from database
        $edit_slider = Slider::where('slider_id', $slider_id)
            ->first();
        $creator = $edit_slider->getCreator();

        if ($edit_slider->count() > 0) {
            //get view
            $manager_sliders = view('admin.sub.edit_slider')
                ->with('edit_slider', $edit_slider)
                ->with('creator', $creator);

            //put data into view
            Session::put('messenge', 'Your slider was edited!!');
        } else {
            //get view
            $manager_sliders = view('admin.sub.edit_slider');

            //put data into view
            Session::put('messenge', 'Your slider was not edited!!');
        }


        //return view
        return view('admin.main.admin_layout')->with('admin.sub.edit_slider', $manager_sliders);
    }

    public function update_slider(Request $request, $slider_id)
    {
        $this->AuthLogin();
        //get data from view
        $data = array();
        $data['slider_name'] = $request->val_name_slider;
        $data['slider_url'] = $request->val_slug_slider;
        $data['slider_position'] = $request->val_position_slider;
        $data['slider_img_url'] = $request->val_image_url;
        $data['status'] = $request->val_status_slider ? 1 : 0;

        //update data into database
        $updated = Slider::where('slider_id', $slider_id)->update($data);

        //put data into view
        if ($updated) {
            Session::put('messenge', 'Your slider was updated!!');
        } else {
            Session::put('messenge', 'Your slider was not updated!!');
        }

        //return view
        return Redirect::to('admin/all-sliders');
    }

    public function delete_slider($slider_id)
    {
        $this->AuthLogin();
        //delete data from database
        $deleted = Slider::where('slider_id', $slider_id)->delete();

        //put data into view
        if ($deleted) {
            Session::put('messenge', 'Your slider was deleted!!');
        } else {
            Session::put('messenge', 'Your slider was not deleted!!');
        }

        //return view
        return Redirect::to('admin/all-sliders');
    }
}
