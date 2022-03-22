<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ProductController extends Controller
{
    public function all_product()
    {
        $all_products = DB::table('products')->get();
        $manager_products = view('admin.all_product')->with('all_products', $all_products);
        return view('admin_layout')->with('admin.all_products', $manager_products);
    }

    public function add_product()
    {
        return view('admin.add_product');
    }

    public function save_product(Request $request)
    {
        $data = array();

        $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;


        DB::table('products')->insert($data);

        Session::put('messenge', 'Your product was added!!');
        return Redirect::to('add-product');
    }

    public function edit_product($product_id)
    {
        $all_products = DB::table('products')->where('product_id', $product_id)->get();
        $manager_products = view('admin.edit_product')->with('edit_product', $all_products);
        Session::put('messenge', 'Your product was edited!!');
        return view('admin_layout')->with('admin.edit_product', $manager_products);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;
        // $data['name'] = $request->val_name_product;

        DB::table('products')->where('product_id', $product_id)->update($data);
        Session::put('messenge', 'Your product was updated!!');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id)
    {
        return Redirect::to('all-product');
        
        Session::put('messenge', 'Your product was deleted!!');
        return Redirect::to('all-product');
    }
}
