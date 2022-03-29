@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sliders</h4>
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
                                    <th>URL</th>
                                    <th>posittion</th>
                                    <th>Image URL</th>
                                    <th>Created at</th>
                                    <th>Created by</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($all_sliders) {
                                    foreach ($all_sliders as $slider) {
                                        if ($slider->status == 1) {
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
                                            <td>{{ $slider->slider_id }}</td>
                                            <td>{{ $slider->slider_name }}</td>
                                            <td>{{ $slider->slider_url }}</td>
                                            <td>{{ $slider->slider_posittion }}</td>
                                            <td>{{ $slider->slider_img_url }}</td>
                                            <td>{{ $slider->create_at }}</td>
                                            <td>{{ $slider->create_by }}</td>
                                            <td><span class='badge light {{ $status }} badge-sm'>{{ $statusContent }}</span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ URL::to('admin/edit-slider/' . $slider->slider_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ URL::to('admin/delete-slider/' . $slider->slider_id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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