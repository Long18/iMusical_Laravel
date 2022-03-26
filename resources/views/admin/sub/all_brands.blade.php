@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">brands</h4>
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
                                    <th>Create Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_brands as $item => $brand)
                                <tr>
                                    <td><img class="rounded-circle" width="35" src="{{ asset('public/backend/images/profile/small/pic1.jpg') }}" alt="">
                                    </td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->create_at }}</td>
                                    <td>
                                        <span class='badge light <?php if ($brand->status == 1) {
                                                                        echo 'badge-success';
                                                                    } else {
                                                                        echo 'badge-danger';
                                                                    } ?> badge-sm'>
                                            <?php if ($brand->status == 1) {
                                                echo "Avaiable";
                                            } else {
                                                echo "Unavaiable";
                                            }
                                             ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ URL::to('admin/edit-brand/' . $brand->brand_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('admin/delete-brand/' . $brand->brand_id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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