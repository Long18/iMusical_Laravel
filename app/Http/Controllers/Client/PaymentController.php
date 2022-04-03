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

    public function create_transaction()
    {
        return view('transaction');
    }

    public function process_transaction(Request $request)
    {

        //$provider = new PayPalCient;
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo_payment(Request $request)
    {
        $data = $request->all();
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $serectkey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";

        $orderInfo = "Thanh toán qua MoMo";
        $amount = $data['total_momo'];
        $orderid = time() . "";
        $returnUrl = "http://imusical.com/";
        $notifyurl = "http://imusical.com/checkout";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";


        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        $extraData = "";
        //before sign HMAC SHA256 signature

        // echo $serectkey;die;
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId="
            . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderid
            . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl
            . "&extraData=" . $extraData . "&requestType=" . $requestType;

        $signature = hash_hmac("sha256", $rawHash, $serectkey);

        $data =  array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Isekai",
            "storeId" => "MomoTestStore",
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderid,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'lang' => "vi",
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        error_log(print_r($jsonResult, true));
        header('Location: ' . $jsonResult['payUrl']);
    }

    public function return(Request $request)
    {
        $url = session('url_prev', '/');
        if ($request->vnp_ResponseCode == "00") {
            $this->apSer->thanhtoanonline(session('cost_id'));
            //return redirect($url)->with('success', 'Đã thanh toán phí dịch vụ');
            return Redirect::to('/save_order')->with('success', 'Đã thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }

    public function vnpay_payment(Request $request)
    {
        $data = $request->all();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://imusical.com/return-vnpay";
        $vnp_TmnCode = 'UDOPNWS1'; //env('TmnCode'); //Mã website tại VNPAY
        $vnp_HashSecret = 'EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN'; //env('HashSecret'); //Chuỗi bí mật

        $ref = rand(1, 10000);

        $vnp_TxnRef = $ref; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng test";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = Session::get('order_total_price') * 100; //$data['total_vnpay']
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = request()->ip();
        //Add Params of 2.0.1 Version
        //$vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        // $vnp_Bill_City = $_POST['txt_bill_city'];
        // $vnp_Bill_Country = $_POST['txt_bill_country'];
        // $vnp_Bill_State = $_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        // $vnp_Inv_Email = $_POST['txt_inv_email'];
        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        // $vnp_Inv_Company = $_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
}
