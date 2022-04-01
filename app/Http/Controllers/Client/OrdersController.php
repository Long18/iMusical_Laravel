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
        //set date default timezone in Vietname
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $user_id = session()->get('user_id');
        $cart = session()->get('cart', []);
        $total_price = session()->get('total_price');
        $date = date('d/m/Y H:i:s');

        foreach ($cart as $key => $value) {
            $data['user_id'] = $user_id;
            $data['order_export_date'] = $date;
            $data['oder_total_sum'] = $total_price;
            $data['delivery_email'] = $request->order_email;
            $data['delivery_name'] = $request->order_name;
            $data['delivery_phone'] = $request->order_phone;
            $data['delivery_notes'] = $request->order_description;
            $data['delivery_address'] = $request->order_address;
            $data['transport_fee'] = $request->order_shipping_fee;
            $data['created_by'] = $cart[$key]['created_by'];
        }

        $order_id = Order::insertGetId($data);

        foreach ($cart as $val => $element) {
        $detail['order_id'] = $order_id;
        $detail['product_id'] = $cart[$val]['product_id'];
        $detail['order_detail_price'] = $cart[$val]['product_price'];
        $detail['order_detail_quantity'] = $cart[$val]['product_quantity'];
        $detail['order_detail_price_sale'] = $cart[$val]['product_price_sale'];
        $detail['order_detail_total'] = $cart[$val]['product_price_sale'];
        }

        $order_detail_id = OrderDetail::insertGetId($detail);


        session()->put('order_id', $order_id);
        session()->put('orderorder_detail_id_id', $order_detail_id);

        return Redirect::to('/payment');
    }

    public function payment()
    {
    }
}
