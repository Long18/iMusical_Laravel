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
                        
                        $creator = $edit_order->getCreator();
                        $buyer = $edit_order->getUser();
                        ?>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ URL::to('admin/update-order/'.$edit_order->order_id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_order">Order Code
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_order" name="val_name_order" value="{{$edit_order->order_code}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_slug_order">Export Day<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_slug_order" name="val_slug_order"  value="{{$edit_order->order_export_date}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_price_order">Total Price
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_price_order" name="val_price_order"value="{{$edit_order->order_total_sum}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_price_sale">Transport Fee
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_price_sale" name="val_price_sale"  value="{{$edit_order->transport_fee}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_end_sale">Transport Type<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_end_sale" name="val_end_sale" value="{{$edit_order->transport_type}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_detail_order">Created At
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val_end_sale" name="val_end_sale" value="{{$edit_order->created_at}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_detail_order">Creator
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val_end_sale" name="val_end_sale"  value="{{$creator->user_name}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_category_order">Buyer
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_category_order" name="val_category_order" value="{{$buyer->user_name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_created_at">Delivery Receiver
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_created_at" name="val_created_at" value="{{$edit_order->delivery_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_created_by">Delivery Address
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_created_by" name="val_created_by" value="{{$creator->delivery_address}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_amount_order">Delivery Phone
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_amount_order" name="val_amount_order"  value="{{$edit_order->delivery_phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_amount_order">Delivery Email
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_amount_order" name="val_amount_order" value="{{$edit_order->delivery_email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_amount_order">Payment Method
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_amount_order" name="val_amount_order" value="{{$edit_order->delivery_payment_method}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_amount_order">Payment Status
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_amount_order" name="val_amount_order"  value="{{$edit_order->delivery_payment_status}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"><a href="javascript:void()"> Status </a> <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val_status_order">
                                                    <select>
                                                        <option value="1">Waiting Comfirm</option>
                                                        <option value="1">Packing</option>
                                                        <option value="1">Delivering</option>
                                                        <option value="1">Delivered</option>
                                                        <option value="1">Cancel</option>
                                                        <option value="1">Unavaiable</option>
                                                    </select>
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
                        <h4 class="card-title">Product type detail | <a href="{{ URL::to('admin/add-order-detail/'.$edit_order->order_id) }}" class="bg-success text-light " style="padding: 0.2rem 0.8rem; border-radius: 0.4rem;">Add Type Detail</a></h4>
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
                                    if ($order_details) {
                                        foreach ($order_details as $order_detail) {                          
                                    ?>
                                        <tr>
                                            
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