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
                                    <th>ID</th>

                                    <th>User</th>
                                    <th>Created At</th>
                                    <th>Total Sum</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($all_orders) {
                                    foreach ($all_orders as $item => $order) {
                                        $user = $order->getUser();
                                        switch ($order->status) {
                                            case 1:
                                                $status = 'badge-warning';
                                                $statusContent ='Waiting Comfirm';
                                                break;
                                            case 2:
                                                $status = 'badge-warning';
                                                $statusContent ='Packing';
                                                break;
                                            case 3:
                                                $status = 'badge-warning';
                                                $statusContent ='Delivering';
                                                break;
                                            case 4:
                                                $status = 'badge-success';
                                                $statusContent ='Delivered';
                                                break;
                                            case -1:
                                                $status = 'badge-danger';
                                                $statusContent ='Cancel';
                                                break;
                                            case 0:
                                                $status = 'badge-danger';
                                                $statusContent ='Unavaiable';
                                                break;
                                        }
                                ?>
                                        <tr>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $user->user_email }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->order_total_sum }}</td>
                                            <td><span class='badge light {{ $status }} badge-sm'>{{ $statusContent }}</span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ URL::to('admin/edit-order/' . $order->order_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('admin/delete-order/' . $order->order_id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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