<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
}
