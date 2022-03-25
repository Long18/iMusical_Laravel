@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update user</h4>
                    </div>
                    <div class="card-body">
                        <?php

                        use App\Models\Role;
                        use Illuminate\Support\Facades\Session;

                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert">' . $message . '</span>';
                            Session::put('message', null);
                            // If message not empty -> make empty
                        }
                        ?>
                        <div class="form-validation">
                            <form class="form-valide" action="{{ URL::to('/admin/update-user/'.$edit_user->user_id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_user"><b>Name</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_user" name="val_name_user" placeholder="Enter a name user.." value="{{$edit_user->user_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_email_user"><b>Email</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_email_user" name="val_email_user" placeholder="Your valid Slug.." value="{{$edit_user->user_email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="al_image_url"><b>Email Verified</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="al_image_url" name="al_image_url" placeholder="None.." value="{{$edit_user->email_verified_at}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_create_at"><b>Created at</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_create_at" name="val_create_at" placeholder="Unknow.." value="{{$edit_user->created_at}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_status_user"><b>Status</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="checkbox" class="css-control-input mr-2" id="val_status_user" name="val_status_user" value="1" <?php echo ($edit_user->status == 1 ? "checked" : "")  ?>>
                                                <span class="css-control-indicator"></span> Avaiable</label>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"><b><a href="javascript:void()">Terms
                                                    &amp; Conditions</a></b> <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                    <input type="checkbox" class="css-control-input mr-2" id="val-terms" name="val-terms" value="1">
                                                    <span class="css-control-indicator"></span> I agree to the
                                                    terms</label>
                                            </div>
                                        </div> -->
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Roles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role Name</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($user_roles) {
                                        foreach ($user_roles as $user_role) {
                                            $role = Role::where('status', 1)
                                            ->where('role_id', $user_role->role_id)
                                            ->first();

                                            if($user_role->end_at == null || $user_role->end_at > NOW()){
                                                if ($user_role->status == 1) {
                                                    $status = 'badge-success';
                                                    $statusContent = 'Avaiable';
                                                } else {
                                                    $status = 'badge-danger';
                                                    $statusContent = 'Unavaiable';
                                                }
                                            }else{
                                                $status = 'badge-warning';
                                                $statusContent = 'Expired';
                                            }
                                            
                                    ?>
                                            <tr>

                                                <td><b>{{ $user_role->role_id}}</b></td>
                                                <td> {{$role->role_name}}</td>
                                                <td><span class='badge light {{ $status }} badge-sm'>{{ $statusContent }}</span></td>
                                                <td> {{$user_role->created_at}}</td>
                                                <td> {{$user_role->end_at}}</td>
                                                <td>
                                                    <div class="d-flex form-group">
                                                        <a id="button-edit" href="{{ URL::to('admin/edit-user-role/' . $user_role->role_id .'/'. $edit_user->user_id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        <a onclick="return confirm('Are you sure to delete?')" href="" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
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
</div>
@endsection