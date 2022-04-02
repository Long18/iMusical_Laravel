<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $date = date('d/m/Y H:i:s');


        $data['user_id'] = $user_id;
        $data['created_at'] = $request->created_at;
        $data['order_total_sum'] = $total_price;
        $data['delivery_email'] = $request->order_email;
        $data['delivery_name'] = $request->order_name;
        $data['delivery_phone'] = $request->order_phone;
        $data['delivery_notes'] = $request->order_description;
        $data['delivery_address'] = $request->order_address;
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





        session()->put('order_id', $order_id);
        session()->put('orderorder_detail_id_id', $order_detail_id);
        session()->remove('cart');

        return Redirect::to('/payment');
    }

    public function payment()
    {
    }
}
