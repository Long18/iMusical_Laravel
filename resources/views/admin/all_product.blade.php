@extends('admin_layout')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width50">
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="checkAll"
                                                    required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th><strong>ROLL NO.</strong></th>
                                        <th><strong>NAME</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Status</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td><strong>542</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="public/images/avatar/1.jpg"
                                                    class="rounded-lg mr-2" width="24" alt="" /> <span
                                                    class="w-space-no">Dr.
                                                    Jackson</span></div>
                                        </td>
                                        <td><a href="https://vora.dexignlab.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="0b6e736a667b676e4b6e736a667b676e25686466">[email&#160;protected]</a>
                                        </td>
                                        <td>01 August 2020</td>
                                        <td>
                                            <div class="d-flex align-items-center"><i
                                                    class="fa fa-circle text-success mr-1"></i>
                                                Successful</div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox3"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox3"></label>
                                            </div>
                                        </td>
                                        <td><strong>542</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="public/images/avatar/2.jpg"
                                                    class="rounded-lg mr-2" width="24" alt="" /> <span
                                                    class="w-space-no">Dr.
                                                    Jackson</span></div>
                                        </td>
                                        <td><a href="https://vora.dexignlab.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="cfaab7aea2bfa3aa8faab7aea2bfa3aae1aca0a2">[email&#160;protected]</a>
                                        </td>
                                        <td>01 August 2020</td>
                                        <td>
                                            <div class="d-flex align-items-center"><i
                                                    class="fa fa-circle text-danger mr-1"></i>
                                                Canceled</div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox4"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox4"></label>
                                            </div>
                                        </td>
                                        <td><strong>542</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="public/images/avatar/3.jpg"
                                                    class="rounded-lg mr-2" width="24" alt="" /> <span
                                                    class="w-space-no">Dr.
                                                    Jackson</span></div>
                                        </td>
                                        <td><a href="https://vora.dexignlab.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="2f4a574e425f434a6f4a574e425f434a014c4042">[email&#160;protected]</a>
                                        </td>
                                        <td>01 August 2020</td>
                                        <td>
                                            <div class="d-flex align-items-center"><i
                                                    class="fa fa-circle text-warning mr-1"></i>
                                                Pending</div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
