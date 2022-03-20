<!DOCTYPE html>
<html lang="en" class="h-100">

<!-- Mirrored from vora.dexignlab.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Mar 2022 04:04:53 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin | Page Login</title>
    <meta name="description" content="Some description for the page" />

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/backend/images/favicon.png') }}">
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{ URL::to('/dashboard') }}"><img
                                                src="{{ asset('public/backend/images/logo-full.png') }}" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <?php
                                    
                                    use Illuminate\Support\Facades\Session;
                                    
                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<span class="text-alert">' . $message . '</span>';
                                        Session::put('message', null);
                                        // If message not empty -> make empty
                                    }
                                    ?>
                                    <form action="{{ URL::to('/admin-dashboard') }}" method="post">
                                        {{-- Token random --}}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" name="admin_email" class="form-control" value="Your Account" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="admin_password" class="form-control" value="Password" required="">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1 text-white">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Remember
                                                        my preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white"
                                                    href="{{ URL::to('/forgot-password') }}">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me
                                                In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white"
                                                href="{{ URL::to('/register') }}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/backend/vendor/global/global.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('public/backend/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/backend/js/dlabnav-init.js') }}" type="text/javascript"></script>

</body>

<!-- Mirrored from vora.dexignlab.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Mar 2022 04:04:54 GMT -->

</html>
