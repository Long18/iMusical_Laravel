@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Order</h4>
                    </div>
                    <div class="card-body">
                        <?php

use App\Models\Product;
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
                                            <label class="col-lg-4 col-form-label" for="val_code_order">Order Code
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_code_order" name="val_code_order" value="{{$edit_order->order_code}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_export_day">Export Day<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_export_day" name="val_export_day" value="{{$edit_order->order_export_date}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_total_price_order">Total Price
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_total_price_order" name="val_total_price_order" value="{{$edit_order->order_total_sum}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_transport_fee">Transport Fee
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_transport_fee" name="val_transport_fee" value="{{$edit_order->transport_fee}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_transport_type">Transport Type<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_transport_type" name="val_transport_type" value="{{$edit_order->transport_type}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_created_at">Created At
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_created_at" name="val_created_at" value="{{$edit_order->created_at}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_creator">Creator
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_creator" name="val_creator" value="{{$creator->user_name}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_buyer">Buyer
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_buyer" name="val_buyer" value="{{$buyer->user_name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_delivery_name">Delivery Receiver
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_delivery_name" name="val_delivery_name" value="{{$edit_order->delivery_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_delivery_address">Delivery Address
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_delivery_address" name="val_delivery_address" value="{{$creator->delivery_address}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_delivery_phone">Delivery Phone
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_delivery_phone" name="val_delivery_phone" value="{{$edit_order->delivery_phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_delivery_email">Delivery Email
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_delivery_email" name="val_delivery_email" value="{{$edit_order->delivery_email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_payment_method">Payment Method
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_payment_method" name="val_payment_method" value="{{$edit_order->delivery_payment_method}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_payment_status">Payment Status
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_payment_status" name="val_payment_status" value="{{$edit_order->delivery_payment_status}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_status_order">Status <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control default-select" id="val_status_order" name="val_status_order">
                                                    <option value="1">Waiting Comfirm</option>
                                                    <option value="2">Packing</option>
                                                    <option value="3">Delivering</option>
                                                    <option value="4">Delivered</option>
                                                    <option value="-1">Cancel</option>
                                                    <option value="0">Unavaiable</option>
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
                                        <th>Product ID</th>
                                        <th>Price</th>
                                        <th>Price Sale</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($order_details) {
                                        foreach ($order_details as $order_detail) {
                                    ?>
                                            <tr>
                                                <td>{{ $order_detail->order_detail_id }}</td>
                                                <td>{{ $order_detail->product_id }}</td>
                                                <td>{{$order_detail->order_detail_price}}</td>
                                                <td>{{ $order_detail->order_detail_price_sale}}</td>
                                                <td>{{ $order_detail->order_detail_quantity }}</td>
                                                <td>{{$order_detail->getTotalSum()}}</td>
                                                <td>
                                                    <div class="d-flex">

                                                        <a href="{{ URL::to('admin/edit-order-detail/'.$edit_order->order_id .'/'.$order_detail->order_detail_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        <a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('admin/delete-order-detail/' . $order_detail->order_detail_id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>

                                                    </div>
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