@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Product</h4>
                    </div>
                    <div class="card-body">
                        <?php

use App\Models\Type;
use Illuminate\Support\Facades\Session;

                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert">' . $message . '</span>';
                            Session::put('message', null);
                            // If message not empty -> make empty
                        }
                        $category = $edit_product->getCategory();
                        $creator = $edit_product->getCreator();
                        ?>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ URL::to('admin/update-product/'.$edit_product->product_id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_product">Product Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_product" name="val_name_product" placeholder="Enter a name product.." value="{{$edit_product->product_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_brand_product">Brand <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control default-select" id="val_brand_product" name="val_brand_product">
                                                    <?php
                                                    foreach ($brands as $brand) {
                                                        if ($brand->brand_id == $edit_product->brand_id) {
                                                            echo '<option value="' . $brand->brand_id . '" selected>' . $brand->brand_name . '</option>';
                                                        } else {
                                                            echo '<option value="' . $brand->brand_id . '">' . $brand->brand_name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_slug_product">Slug <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_slug_product" name="val_slug_product" placeholder="Your valid Slug.." value="{{$edit_product->slug}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_price_product">Price
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_price_product" name="val_price_product" placeholder="Choose a good one.." value="{{$edit_product->product_price}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_price_sale">Sale Price
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_price_sale" name="val_price_sale" placeholder="Choose a good one.." value="{{$edit_product->product_sale_price}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_end_sale">End Sale <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="datetime-local" class="form-control" id="val_end_sale" name="val_end_sale" placeholder="..and confirm it!" value="{{$edit_product->product_end_sale}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_detail_product">Detail
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="val_detail_product" name="val_detail_product" rows="5" placeholder="What would you like to see?">{{$edit_product->product_detail}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_category_product">Category
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_category_product" name="val_category_product" placeholder="..and confirm it!" value="{{ $category->type_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_created_at">Created At
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_created_at" name="val_created_at" value="{{$edit_product->created_at}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_created_by">Created By
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_created_by" name="val_created_by" value="{{$creator->user_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_amount_product">Product Amount
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val_amount_product" name="val_amount_product" placeholder="" min="0" value="{{$edit_product->product_amount}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"><a href="javascript:void()"> Status </a> <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val_status_product">
                                                    <input type="checkbox" class="css-control-input mr-2" id="val_status_product" name="val_status_product" value="1" <?php if($edit_product->status == 1) echo "checked" ?>>
                                                    <span class="css-control-indicator"></span> Available</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product type detail | <a href="{{ URL::to('admin/add-product-type-detail/'.$edit_product->product_id) }}" class="bg-success text-light " style="padding: 0.2rem 0.8rem; border-radius: 0.4rem;">Add Type Detail</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($product_type_details) {
                                        foreach ($product_type_details as $type_detail) {   
                                            $type = $type_detail->getType();                         
                                    ?>
                                        <tr>
                                            <td>{{$type_detail->type_detail_id}}</td>
                                            <td>{{$type->type_name}}</td>
                                            <td>{{$type_detail->type_detail_value}}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/edit-product-type-detail/'.$edit_product->product_id.'/'.$type_detail->type_detail_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ URL::to('admin/delete-product-type-detail/'.$type_detail->type_detail_id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Images | <a href="{{ URL::to('admin/add-product-image/'.$edit_product->product_id) }}" class="bg-success text-light " style="padding: 0.2rem 0.8rem; border-radius: 0.4rem;">Add Image</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>URL</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($images) {
                                        foreach ($images as $image) {                       
                                    ?>
                                        <tr>
                                            <td><img class="rounded-circle" width="100" src="/{{$image->product_img_name}}" alt="">
                                            <td>{{$image->product_img_name}}</td>
                                            <td>{{$image->product_img_type}}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/edit-product-image/'.$edit_product->product_id.'/'.$image->product_img_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ URL::to('admin/delete-product-image/'.$image->product_img_id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection