@extends('admin.main.admin_layout')
@section('admin_content')

<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Types</h4>
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
                                    <th>Detail</th>
                                    <th>Key</th>
                                    <th>Parent</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($all_types) {
                                    foreach ($all_types as $item => $type) {
                                        $parent = $type->getParent();
                                        
                                ?>

                                        <tr>
                                            <td><img class="rounded-circle" width="35" src="{{ asset('public/backend/images/profile/small/pic1.jpg') }}" alt="">
                                            </td>
                                            <td>{{ $type->type_name }}</td>
                                            <td>{{ $type->type_meta_desc }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $type->type_meta_key }}</strong></a></td>
                                            <td><a href="javascript:void(0);"><strong><?php echo $parent? $parent->type_name:"NULL" ?></strong></td>
                                            <td>{{ $type->create_at }}</td>
                                            <td>
                                                <div class="d-flex">

                                                    <a href="{{ URL::to('admin/edit-type/' . $type->type_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('admin/delete-type/' . $type->type_id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>

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