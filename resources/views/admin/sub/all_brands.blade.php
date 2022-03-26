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
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_types as $item => $type)
                                        <tr>
                                            <td><img class="rounded-circle" width="35"
                                                    src="{{ asset('public/backend/images/profile/small/pic1.jpg') }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $type->type_name }}</td>
                                            <td>{{ $type->type_meta_desc }}</td>
                                            <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                            <td><a href="javascript:void(0);"><strong><span class="__cf_email__"
                                                            data-cfemail="0960676f66496c71686479656c276a6664">[email&#160;protected]</span></strong></a>
                                            </td>
                                            <td>{{ $type->create_at }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ URL::to('admin/edit-type/' . $type->type_id) }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')"
                                                        href="{{ URL::to('admin/delete-type/' . $type->type_id) }}"
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
