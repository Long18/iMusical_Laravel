@extends('admin.main.admin_layout')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Brand</h4>
                    </div>
                    <div class="card-body">
                        <?php

                        use Illuminate\Support\Facades\Session;

                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert">' . $message . '</span>';
                            Session::put('message', null);
                            // If message not empty -> make empty
                        }
                        ?>
                        <div class="form-validation">
                            <form class="form-valide" action="{{URL::to('/admin/save-brand')}}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_name_brand"><b>Name</b>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_name_brand" name="val_name_brand" placeholder="Enter a name type.." >
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_slug_type"><b>Slug</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val_slug_type" name="val_slug_type" placeholder="Your valid Slug.." >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="al_image_url"><b>Image URL</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="al_image_url" name="al_image_url" placeholder="Choose a beautifull one..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_parent_type"><b>Parent</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control default-select" id="val_parent_type" name="val_parent_type">
                                                    <option value="NULL"><b>Please select</b></option>
                                                    <?php

                                                    if ($parents) {
                                                        foreach ($parents as $parent) {
                                                    ?>
                                                            <option value="{{$parent->type_id}}" >{{$parent->type_name}}</option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_meta_key"><b>Meta Keywords</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val_meta_key" name="val_meta_key" placeholder="Choose a beautifull one.." >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_meta_desc"><b>Meta Description</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="val_meta_desc" name="val_meta_desc" placeholder="Make type description.." style="min-height: 10rem;"></textarea>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val_status_brand"><b>Status</b>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="checkbox" class="css-control-input mr-2" id="val_status_brand" name="val_status_brand" >
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

        </div>

    </div>
</div>
@endsection