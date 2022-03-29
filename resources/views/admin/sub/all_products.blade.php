@extends('admin.main.admin_layout')
@section('admin_content')

<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Products</h4>
                </div>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Amount</th>
                                    <th>Create Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($all_products) {
                                    foreach ($all_products as $item => $product) {
                                        $brand = $product->getBrand();
                                        if($product->status == 1){
                                            if($product->product_amount < 1){
                                                $status = 'badge-warning';
                                                $statusContent = 'Out of stock';
                                            }else{
                                                $status = 'badge-success';
                                                $statusContent = 'Avaiable';
                                            }
                                        }else{
                                            $status = 'badge-danger';
                                            $statusContent = 'Unavaiable';
                                        }
                                ?>
                                        <tr>
                                            <td><img class="rounded-circle" width="35" src="{{ asset('public/backend/images/profile/small/pic1.jpg') }}" alt="">
                                            </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $brand->brand_name }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->product_sale_price }}</td>
                                            <td>{{ $product->product_amount }}</td>
                                            <td>{{ $product->create_at }}</td>
                                            <td><span class='badge light {{ $status }} badge-sm'>{{ $statusContent }}</span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ URL::to('admin/edit-product/' . $product->product_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('admin/delete-product/' . $product->product_id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
@endsection