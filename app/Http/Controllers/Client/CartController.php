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
        // print_r($data);

        // get string, encode by md5, and random string form 0 to 26, get 5 charter
        // sesion id được tạo ra mỗi khi user thêm từ giỏ hàng
        // thêm xoá sửa sẽ sử dụng luôn cái session id này
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if (!$cart) {
            $cart = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_price' => $data['cart_product_price'],
                'product_quantity' => $data['cart_product_quantity'],
            );
        } else {
            $is_avaiable = 0;
            foreach ($cart as $key => $value) {
                //Check xem giỏ hàng có trùng không
                if ($value['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                }
                // Nếu không trùng thì tạo ra giỏ mới
                if ($is_avaiable == 0) {
                    $cart[] = array(
                        'session_id' => $session_id,
                        'product_name' => $data['cart_product_name'],
                        'product_id' => $data['cart_product_id'],
                        'product_price' => $data['cart_product_price'],
                        'product_quantity' => $data['cart_product_quantity'],
                    );
                    Session::push('cart', $cart);
                }
            }
        }
        Session::post('cart', $cart);
        Session::save();
    }

    // public function save_cart(Request $request)
    // {

    //     //get value form view
    //     $productId = $request->producid_hidden;
    //     $quantity = $request->quantity;

    //     //get product
    //     $products = Product::where('product_id', $productId)
    //         ->first();

    //     $data['product_id'] = $products->product_id;
    //     $data['product_name'] = $products->product_name;
    //     $data['product_quantity'] = $products->product_id;
    //     $data['product_price'] = $products->product_price;

    //     //add to cart

    //     return Redirect::to('/show_cart');
    // }

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
