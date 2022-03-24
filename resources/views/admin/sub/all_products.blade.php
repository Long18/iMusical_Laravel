@extends('admin.main.admin_layout')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product</h4>
                    </div>
                    <?php
                    
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
                                        <th>Price</th>
                                        <th>Sale</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_products as $item => $product)
                                        <tr>
                                            <td><img class="rounded-circle" width="35"
                                                    src="{{ asset('public/backend/images/profile/small/pic1.jpg') }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->detail }}</td>

                                            <?php
                                                if ($product->status == 1){
                                                    echo"
                                                <td>
                                                    <span class='badge light badge-success .badge-sm'>
                                                        Available
                                                    </span>
                                                </td>";
                                            }
                                            else{
                                                echo"
                                                <td>
                                                    <span class='badge light badge-danger .badge-sm'>
                                                        Sould Out
                                                    </span>
                                                </td>";
                                            }
                                                    ?>
                                            <td><a href="javascript:void(0);"><strong><span class="__cf_email__"
                                                            data-cfemail="0960676f66496c71686479656c276a6664">[email&#160;protected]</span></strong></a>
                                            </td>
                                            <td>{{ $product->create_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ URL::to('admin/edit-product/' . $product->product_id) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')"
                                                        href="{{ URL::to('admin/delete-product/' . $product->product_id) }}"
                                                        class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
