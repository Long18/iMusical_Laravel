<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $data = $request->all();
        //print_r($data);

        // get string, encode by md5, and random string form 0 to 50, get 5 charter
        // sesion id được tạo ra mỗi khi user thêm từ giỏ hàng
        // thêm xoá sửa sẽ sử dụng luôn cái session id này
        $session_id = substr(md5(microtime()), rand(0, 50), 5);
        //get all data session cart
        $cart = session()->get('cart', []);

        //check if product is already in cart
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $value) {
                //Check xem giỏ hàng có trùng không
                if ($value['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                } else {
                    $is_avaiable = 0;
                }
            }
            // Nếu không trùng thì tạo ra giỏ mới
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_price' => $data['cart_product_price'],
                    'product_sale_price' => $data['cart_product_sale_price'],
                    'product_quantity' => $data['cart_product_quantity'],
                );
                session()->put('cart', $cart);
            } else {
                // Nếu trùng thì cộng thêm số lượng
                foreach ($cart as $key => $value) {
                    if ($value['product_id'] == $data['product_id']) {
                        $cart[$key]['product_quantity'] = $value['product_quantity'] + $data['cart_product_quantity'];
                    }
                }
                session()->put('cart', $cart);
            }
        } else {
            // If cart is empty, add new product to cart
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_price' => $data['cart_product_price'],
                'product_sale_price' => $data['cart_product_sale_price'],
                'product_quantity' => $data['cart_product_quantity'],
            );
        }
        session()->put('cart', $cart);
        session()->save();
    }

    public function update_cart(Request $request)
    {
        // get all data from cart
        $data = $request->all();
        //get cart from session
        $cart = session()->get('cart', []);
        if ($cart == true) {
            $message = '';
            // get quantity by card
            foreach ($data['cart_quantity'] as $key => $value) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key && $value < $cart[$session]['produc_quantity']) {
                        $cart[$session]['product_quantity'] = $value;
                        $message = 'Update cart success';
                    } elseif ($val['session_id'] == $key && $value > $cart[$session]['produc_quantity']) {
                        $message = 'Update cart fail';
                    }
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()->back()->with('message', 'Update cart fail');
        }
    }

    public function delete_cart($session_id)
    {
        //get cart from session
        $cart = session()->get('cart', []);
        //check cart is empty or not
        if ($cart == true) {
            //check session id is exist or not
            foreach ($cart as $key => $value) {
                //if session id is exist then delete cart
                if ($value['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }

            session()->put('cart', $cart);
            session()->save();
            return redirect()->back()->with('message', 'Delete cart success');
        } else {
            return redirect()->back()->with('message', 'Delete cart error');
        }
    }

    public function delete_all_cart()
    {
        $cart = session()->get('cart', []);

        if ($cart == true) {
            session()->forget('cart');
            session()->save();
            return redirect()->back()->with('message', 'Delete all cart success');
        } else {
            return redirect()->back()->with('message', 'Delete all cart fail');
        }
    }

    public function show_cart(Request $request)
    {


        //get category
        $categories = Type::where('status', 1)
            ->orderby('type_id', 'desc') //desc: descending, asc: ascending
            ->get();

        //get brand
        $brands = Brand::where('status', 1)
            ->orderby('brand_id', 'desc') //desc: descending, asc: ascending
            ->get();

        return view('client.sub.cart.show_cart')
            ->with('category', $categories)
            ->with('brand', $brands);
    }
}
