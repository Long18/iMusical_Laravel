<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();


class OrdersController extends Controller
{
    public function save_order(Request $request)
    {
        $data = array();
        $detail = array();
        $price = 0;
        //set date default timezone in Vietname
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $user_id = session()->get('user_id');
        $cart = session()->get('cart', []);
        $total_price = session()->get('total_price');
        // Get current date, time
        $date = date('Y-m-d H:i:s');

        $ward = Wards::where('ward_id', $request->delivery_ward)->first();
        $province = Province::where('province_id', $request->delivery_province)->first();
        $city = City::where('city_id', $request->delivery_city)->first();

        $full_address = null;
        // if ($ward->ward_name!=null || $province->province_name!=null || $city->city_name!=null) {
        //     $full_address = $request->order_address
        //         . ', ' . $ward->ward_name
        //         . ', ' . $province->province_name
        //         . ', ' . $city->city_name;
        // }

        $data['user_id'] = $user_id;
        $data['created_at'] = $date;
        $data['order_total_sum'] = $total_price;
        $data['delivery_email'] = $request->order_email;
        $data['delivery_name'] = $request->order_name;
        $data['delivery_phone'] = $request->order_phone;
        $data['delivery_notes'] = $request->order_description;
        if ($full_address != null) {
            $data['delivery_address'] = $full_address;
        }
        $data['delivery_address'] = $request->order_address;
        $data['delivery_payment_method'] = $request->order_payment_method;
        $data['transport_fee'] = $request->order_shipping_fee;
        $data['status'] = 1;
        foreach ($cart as $val => $vla) {
            $data['created_by'] = $cart[$val]['created_by'];
        }

        $order_id = Order::insertGetId($data);

        foreach ($cart as $key => $value) {
            $detail['order_id'] = $order_id;
            $detail['product_id'] = $cart[$key]['product_id'];
            $detail['order_detail_price'] = $cart[$key]['product_price'];
            $detail['order_detail_quantity'] = $cart[$key]['product_quantity'];
            $detail['order_detail_price_sale'] = $cart[$key]['product_sale_price'];
            if ($cart[$key]['product_sale_price'] == null) {
                $price = $cart[$key]['product_price'];
            } else {
                $price = $cart[$key]['product_sale_price'];
            }

            $detail['order_detail_total'] = $price;
            $order_detail_id = OrderDetail::insertGetId($detail);
        }

        //dd($request->all());

        session()->put('order_id', $order_id);
        session()->put('order_method', $request->order_payment_method);
        session()->put('order_detail_id', $order_detail_id);
        session()->put('order_total_price', $total_price);
        session()->remove('cart');


        if ($request->order_payment_method == "VNPAY") {
            return Redirect::to('/vnpay-payment');
        } else {
            return Redirect::to('/payment');
        }
    }

    public function payment()
    {
        if (Session::get('order_method') == "Momo") {
            return view('client.payment.momo');
        } else if (Session::get('order_method') == "Paypal") {
            return view('client.payment.paypal');
        } else {
            return view('client.payment.cash');
        }

        session()->remove('order_method');

        return Redirect::to('/');
    }
}
