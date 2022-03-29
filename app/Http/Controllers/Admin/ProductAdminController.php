<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Type;
use App\Models\TypeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ProductAdminController extends Controller
{
    public function all_products()
    {
        //get product from data base
        $all_products = Product::get();

        // return view
        $manager_products = view('admin.sub.all_products')->with('all_products', $all_products);
        return view('admin.main.admin_layout')->with('admin.sub.all_products', $manager_products);
    }

    public function add_product()
    {
        $brands = Brand::where('status',1)->get();
        $categories = Type::where('status',1)->whereNULL('parent_id')->get();
        //return view
        return view('admin.sub.add_product')->with('brands', $brands)->with('categories', $categories);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->val_name_product;
        $data['brand_id'] = $request->val_brand_product;
        $data['slug'] = $request->val_slug_product;
        $data['product_price'] = $request->val_price_product;
        $data['product_sale_price'] = $request->val_price_sale;
        $data['product_end_sale'] = $request->val_end_sale;
        $data['product_amount'] = $request->val_amount_product;
        $data['product_detail'] = $request->val_detail_product;
        $data['category_id'] = $request->val_category_product;
        $data['status'] = $request->val_status_product ? 1 : 0;

        $user_id = Session::get('user_id');
        if($user_id){
            $data['created_by'] = $user_id;
        }else{
            return Redirect::to('/admin/logout');
        }

        // update to database
        Product::insert($data);

        // send to view
        Session::put('messenge', 'Your product was added!!');

        //return view
        return Redirect::to('admin/all-products');
    }

    public function edit_product($product_id)
    {
        $edit_product = Product::where('product_id', $product_id)->first();
        $brands = Brand::where('status', 1)->get();

        $product_type_details = $edit_product->getTypeDetails();

        $manager_products = view('admin.sub.edit_product')
            ->with('edit_product', $edit_product)
            ->with('brands', $brands)
            ->with('product_type_details', $product_type_details);
        Session::put('messenge', 'Your product was edited!!');
        return view('admin.main.admin_layout')->with('admin.sub.edit_product', $manager_products);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->val_name_product;
        $data['brand_id'] = $request->val_brand_product;
        $data['slug'] = $request->val_slug_product;
        $data['product_price'] = $request->val_price_product;
        $data['product_sale_price'] = $request->val_price_sale;
        $data['product_end_sale'] = $request->val_end_sale;
        $data['product_amount'] = $request->val_amount_product;
        $data['product_detail'] = $request->val_detail_product;
        $data['status'] = $request->val_status_product ? 1 : 0;

        Product::where('product_id', $product_id)->update($data);

        Session::put('messenge', 'Your product was updated!!');
        return Redirect::to('admin/all-products');
    }

    public function delete_product($product_id)
    {
        Product::where('product_id', $product_id)->delete();
        Session::put('messenge', 'Your product was deleted!!');
        return Redirect::to('admin/all-products');
    }

    public function add_product_type_detail($product_id)
    {
        $product = Product::where('product_id', $product_id)->first();
        $category = Type::where('type_id', $product->category_id)->first();
        //return view
        return view('admin.sub.add_product_type_detail')
            ->with('product', $product)
            ->with('category', $category);
    }

    public function save_product_type_detail(Request $request, $product_id)
    {
        $data = array();

        // get data from request
        $data['product_id'] = $request->product_id;
        $data['type_id'] = $request->val_type_type_detail;
        $data['type_detail_value'] = $request->val_value_type_detail;

        // update to database
        TypeDetail::insert($data);

        // send to view
        Session::put('messenge', 'Your product was added!!');

        //return view
        return Redirect::to('admin/edit-product/'.$product_id);
    }

    public function edit_product_type_detail($product_id, $type_detail_id)
    {
        $edit_type_detail = TypeDetail::where('type_detail_id', $type_detail_id)
        ->first();
        $manager_products = view('admin.sub.edit_product_type_detail')
            ->with('edit_type_detail', $edit_type_detail)
            ->with('product_id', $product_id);
        Session::put('messenge', 'Your product was edited!!');
        return view('admin.main.admin_layout')->with('admin.sub.edit_product_type_detail', $manager_products);
    }

    public function update_product_type_detail(Request $request, $product_id, $type_detail_id)
    {
        $data = array();
        $data['type_detail_value'] = $request->val_type_value;

        TypeDetail::where('type_detail_id', $type_detail_id)->update($data);
        
        Session::put('messenge', 'Your product was updated!!');
        return Redirect::to('admin/edit-product/'.$product_id);
    }

    public function delete_product_type_detail($type_detail_id)
    {
        TypeDetail::where('type_detail_id', $type_detail_id)->delete();
        Session::put('messenge', 'Your product was deleted!!');
        return Redirect::back();
    }

    public function get_product($product_id){
        return Product::where('product_id', $product_id);
    }
}
