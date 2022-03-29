<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Type;
use App\Models\TypeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrdersAdminController extends Controller
{
    public function all_orders()
    {
        //get order from data base
        $all_orders = Order::get();

        // return view
        $manager_orders = view('admin.sub.all_orders')->with('all_orders', $all_orders);
        return view('admin.main.admin_layout')->with('admin.sub.all_orders', $manager_orders);
    }

    public function add_order()
    {
        $brands = Brand::where('status',1)->get();
        $categories = Type::where('status',1)->whereNULL('parent_id')->get();
        //return view
        return view('admin.sub.add_order')->with('brands', $brands)->with('categories', $categories);
    }

    public function save_order(Request $request)
    {
        $data = array();
        $data['order_code'] = $request->val_code_order;
        $data['order_export_date'] = $request->val_export_day;
        $data['order_total_sum'] = $request->val_total_price_order;
        $data['delivery_name'] = $request->val_end_sale;
        $data['delivery_adress'] = $request->val_price_order;
        $data['delivery_phone'] = $request->val_price_sale;

        $data['delivery_email'] = $request->val_amount_order;
        $data['delivery_payment_method'] = $request->val_amount_order;
        $data['delivery_payment_status'] = $request->val_amount_order;
        $data['transport_fee'] = $request->val_detail_order;
        $data['transport_type'] = $request->val_category_order;
        $data['status'] = $request->val_status_order;

        $user_id = Session::get('user_id');
        if($user_id){
            $data['created_by'] = $user_id;
        }else{
            return Redirect::to('/admin/logout');
        }

        // update to database
        Order::insert($data);

        // send to view
        Session::put('messenge', 'Your order was added!!');

        //return view
        return Redirect::to('admin/all-orders');
    }

    public function edit_order($order_id)
    {
        $edit_order = Order::where('order_id', $order_id)->first();

        $order_details = $edit_order->getOrderDetails();

        $manager_orders = view('admin.sub.edit_order')
            ->with('edit_order', $edit_order)
            ->with('order_details', $order_details);
        Session::put('messenge', 'Your order was edited!!');
        return view('admin.main.admin_layout')->with('admin.sub.edit_order', $manager_orders);
    }

    public function update_order(Request $request, $order_id)
    {
        $data = array();
        $data['order_code'] = $request->val_code_order;
        $data['order_export_date'] = $request->val_export_day;
        $data['order_total_sum'] = $request->val_total_price_order;
        $data['delivery_name'] = $request->val_delivery_name;
        $data['delivery_adress'] = $request->val_delivery_address;
        $data['delivery_phone'] = $request->val_delivery_phone;
        $data['delivery_email'] = $request->val_delivery_email;
        $data['delivery_payment_method'] = $request->val_payment_method;
        $data['delivery_payment_status'] = $request->val_payment_status;
        $data['transport_fee'] = $request->val_transport_fee;
        $data['transport_type'] = $request->val_category_order;
        $data['status'] = $request->val_status_order;

        Order::where('order_id', $order_id)->update($data);

        Session::put('messenge', 'Your order was updated!!');
        return Redirect::to('admin/all-orders');
    }

    public function delete_order($order_id)
    {
        Order::where('order_id', $order_id)->delete();
        Session::put('messenge', 'Your order was deleted!!');
        return Redirect::to('admin/all-orders');
    }

    public function add_order_detail($order_id)
    {   
        //return view
        return view('admin.sub.add_order_detail')
            ->with('order_id', $order_id);
    }

    public function save_order_detail(Request $request, $order_id)
    {
        $data = array();

        // get data from request
        $data['order_id'] = $request->order_id;
        $data['type_id'] = $request->val_type_type_detail;
        $data['type_detail_value'] = $request->val_value_type_detail;

        // update to database
        TypeDetail::insert($data);

        // send to view
        Session::put('messenge', 'Your order was added!!');

        //return view
        return Redirect::to('admin/edit-order/'.$order_id);
    }

    public function edit_order_detail($order_id, $type_detail_id)
    {
        $edit_type_detail = TypeDetail::where('type_detail_id', $type_detail_id)
        ->first();
        $manager_orders = view('admin.sub.edit_order_type_detail')
            ->with('edit_type_detail', $edit_type_detail)
            ->with('order_id', $order_id);
        Session::put('messenge', 'Your order was edited!!');
        return view('admin.main.admin_layout')->with('admin.sub.edit_order_detail', $manager_orders);
    }

    public function update_order_detail(Request $request, $order_id, $type_detail_id)
    {
        $data = array();
        $data['type_detail_value'] = $request->val_type_value;

        TypeDetail::where('type_detail_id', $type_detail_id)->update($data);
        
        Session::put('messenge', 'Your order was updated!!');
        return Redirect::to('admin/edit-order/'.$order_id);
    }

    public function delete_order_detail($type_detail_id)
    {
        TypeDetail::where('type_detail_id', $type_detail_id)->delete();
        Session::put('messenge', 'Your order was deleted!!');
        return Redirect::back();
    }
}
