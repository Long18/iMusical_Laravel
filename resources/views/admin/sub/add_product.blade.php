@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Product</h4>
                    </div>
                    <div class="card-body">
                        <?php

                        use Illuminate\Support\Facades\Session;

                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert">' . $message . '</span>';
                            Session::put('message', null);
                            // If message not empty -> make empty
                        }
                        ?>
                        <div class="form-validation">
                            <form class="form-valide" action="{{URL::to('/admin/save-product')}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_product">Product Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_product" name="val_name_product" placeholder="Enter a name product.."">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_brand_product">Brand <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control default-select" id="val_brand_product" name="val_brand_product">
                                                        <?php
                                                        foreach ($brands as $brand) {
                                                            echo '<option value="' . $brand->brand_id . '">' . $brand->brand_name . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_slug_product">Slug <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val_slug_product" name="val_slug_product" placeholder="Your valid Slug..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_price_product">Price
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val_price_product" name="val_price_product" placeholder="Choose a good one..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_price_sale">Sale Price
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val_price_sale" name="val_price_sale" placeholder="Choose a good one..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_end_sale">End Sale <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="datetime-local" class="form-control" id="val_end_sale" name="val_end_sale" placeholder="..and confirm it!">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_detail_product">Detail
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" id="val_detail_product" name="val_detail_product" rows="5" placeholder="What would you like to see?"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_category_product">Category
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control default-select" id="val_category_product" name="val_category_product">
                                                        <?php
                                                        foreach ($categories as $category) {
                                                            echo '<option value="' . $category->type_id . '">' . $category->type_name . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val_amount_product">Product Amount
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" id="val_amount_product" name="val_amount_product" placeholder="" min="0">
                                                    <span class="text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label"><a href="javascript:void()"> Status </a> <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <label class="css-control css-control-primary css-checkbox" for="val_status_product">
                                                        <input type="checkbox" class="css-control-input mr-2" id="val_status_product" name="val_status_product" value="1">
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
        </div>

    </div>

</div>
</div>
@endsection