@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add type</h4>
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
                            <form class="form-valide" action="{{URL::to('/admin/save-order-detail/' . $order_id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_brand"><b>Order ID</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_brand" name="val_name_brand" value="{{$order_id}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_brand"><b>Product ID</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_brand" name="val_name_brand" value="" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_brand"><b>Price</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val_name_brand" name="val_name_brand" min="0" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_brand"><b>Price Sale</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val_name_brand" name="val_name_brand" min="0" value="0" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-xl-6">
                                    <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_brand"><b>Quantity</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val_name_brand" name="val_name_brand" min="0" value="0" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_brand"><b>Amount</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_brand" name="val_name_brand" value="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" style="padding: 1rem 2rem;font-size: 2rem ;"><b>Submit</b></button>
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
@endsection