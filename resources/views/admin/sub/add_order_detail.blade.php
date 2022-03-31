@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Order Detail</h4>
                    </div>
                    <div class="card-body">
                        <?php

use App\Models\Product;
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
                                            <label class="col-lg-4 col-form-label" for="val_order_id"><b>Order ID</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_order_id" name="val_order_id" value="{{$order_id}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_product_id"><b>Product ID</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            
                                                <input type="text" class="form-control" id="val_product_id" name="val_product_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_price"><b>Price</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="hidden" class="form-control" id="val_price" name="val_price" value="">
                                                <input type="text" class="form-control" id="val_price_txt" name="val_price_txt" min="0" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_sale_price"><b>Price Sale</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="hidden" class="form-control" id="val_sale_price" name="val_sale_price" value="">
                                                <input type="text" class="form-control" id="val_sale_price_txt" name="val_sale_price_txt" min="0" value="0" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_quantity"><b>Quantity</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val_quantity" name="val_quantity" min="0" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_total"><b>Total</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_total" name="val_total" value="" disabled>
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
        <script>
            $(document).ready(function() {
                // find product and bind price and sale price 
                $('#val_product_id').keyup(function() {
                    var value = $(this).val();
                    if (value != '') {
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: "{{ URL::to('/get-product') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                            method: "POST", // phương thức gửi dữ liệu.
                            data: {
                                value: value,
                                _token: _token
                            },
                            success: function(data) { //dữ liệu nhận về
                                $('#val_price').val(data.price);
                                $('#val_price_txt').val(formatNumber(new Number(data.price)));
                                if(data.sale_price == null){
                                    $('#val_sale_price').val(0);
                                    $('#val_sale_price_txt').val(formatNumber(0));
                                }else{
                                    $('#val_sale_price').val(data.sale_price);
                                    $('#val_sale_price_txt').val(formatNumber(new Number(data.sale_price)));
                                    
                                }
                                getTotal();
                            },
                            error: function(){
                                $('#val_price').val(null);
                                $('#val_price_txt').val("Product Not found!!");
                                $('#val_sale_price').val(null);
                                $('#val_sale_price_txt').val("Product Not found!!");
                                getTotal();
                            }
                        });
                    }
                });

                //
                function getTotal(){
                    var price;
                    if($('#val_sale_price').val() > 0){
                        price = $('#val_sale_price').val();
                    }else{
                        price = $('#val_price').val()
                    }
                    
                    var quantity = $('#val_quantity').val();
                    var amount = formatNumber(price * quantity);
                    $('#val_total').val(amount);
                }
                function formatNumber(num) {
                    return num = num.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                }

                $('#val_quantity').change(function() {
                    getTotal();
                });

            });
        </script>
    </div>
</div>
@endsection