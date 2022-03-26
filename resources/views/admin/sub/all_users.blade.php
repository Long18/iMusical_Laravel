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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($all_users) {
                                    foreach ($all_users as $item => $user) {
                                        // $parent = $user->getParent();
                                        if ($user->status == 1) {
                                            $status = 'badge-success';
                                            $statusContent = 'Avaiable';
                                        } else {
                                            $status = 'badge-danger';
                                            $statusContent = 'Unavaiable';
                                        }
                                ?>
                                        <tr>
                                            <td><img class="rounded-circle" width="35" src="{{ asset('public/backend/images/profile/small/pic1.jpg') }}" alt="">
                                            </td>
                                            <td>{{ $user->user_id}}</td>
                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $user->user_email }}</td>
                                            <td><span class='badge light {{ $status }} badge-sm'>{{ $statusContent }}</span></td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ URL::to('admin/edit-user/' . $user->user_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('admin/delete-user/' . $user->user_id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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