<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class CategoryController extends Controller
{
    public function all_product()
    {
        $all_products = DB::table('products')->get();
        $manager_products = view('admin.all_product')->with('all_products',$all_products);
        return view('admin_layout')->with('admin.all_products',$manager_products);
    }

    public function add_product()
    {
        return view('admin.add_product');
    }

    public function save_category_product(Request $request)
    {
        $data = array();

        $data['name'] = $request->val_name_product;
        $data['name'] = $request->val_name_product;
        $data['name'] = $request->val_name_product;
        $data['name'] = $request->val_name_product;
        $data['name'] = $request->val_name_product;
        $data['name'] = $request->val_name_product;


        DB::table('types')->insert($data);

        Session::put('messenge','Your product was added!!');
        return Redirect::to('add-category-product');
    }
}
