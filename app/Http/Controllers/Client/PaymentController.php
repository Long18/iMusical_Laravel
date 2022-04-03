<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

session_start();


class PaymentController extends Controller
{
    public function login_payment()
    {
        return view('client.sub.login');
    }

    public function checkout(Request $request)
    {

        $city = City::orderby('city_id', 'asc')->get();

        $province = Province::orderby('province_id', 'asc')->get();

        $wards = Wards::orderby('ward_id', 'asc')->get();

        return view('client.sub.cart.checkout')
            ->with(compact('city'))
            ->with(compact('province'))
            ->with(compact('wards'));
    }

    public function select_city(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'delivery_city') {
                $select_province = Province::where('city_id', $data['id_result'])
                    ->orderby('city_id', 'asc')->get();
                $output .= '<option>---Select Provience---</option>';
                foreach ($select_province as $key => $value) {
                    $output .= '<option style="color: #fff; font-family: "Urbanist", sans-serif" value="' . $value->province_id . '">' . $value->province_name . '</option>';
                }
            } else {

                $select_ward = Wards::where('province_id', $data['id_result'])
                    ->orderby('province_id', 'asc')->get();
                $output .= '<option>---Select Ward---</option>';
                foreach ($select_ward as $key => $value) {
                    $output .= '<option style="color: #fff; font-family: "Urbanist", sans-serif" value="' . $value->ward_id . '">' . $value->ward_name . '</option>';
                }
            }
        }
        echo $output;
    }

    public function select_payment_method(Request $request)
    {
        $data = $request->all();

        if ($data['payment_method']) {
            $output = '';

            if ($data['payment_method'] == 'Paypal') {
                $output .= '<div id="paypal-button"></div>';
            }

            if ($data['payment_method'] == 'Momo') {
                $output .= '<div class="form-inner" style="padding-top: 3rem" id="momo-button"></div>';
            }

            if ($data['payment_method'] == 'Cash') {
                $output .= '<div class="form-inner" style="padding-top: 3rem">
                <button class="tf-button-submit mg-t-15 submit" type="submit"
                    name="place_order" value="Place your order">Place your
                    order</button>
            </div>';
            }
        }

        echo $output;
    }

    public function create_transaction(){
        return view('transaction');
    }

    public function process_transaction(Request $request){

        //$provider = new PayPalCient;
    }
}
