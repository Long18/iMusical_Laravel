@extends('client.main.welcome')
@section('content')
    <?php

    use Illuminate\Support\Facades\Session;
    use App\Models\Product;

    $message = Session::get('message');


    ?>


    <!-- title page -->
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Login</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="{{ URL::to('/') }}">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tf-login tf-section">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-12">
                    <h2 class="tf-title-heading ct style-1">
                        Login To iMusic
                    </h2>
                    @php
                    if ($message) {
                        echo '<h3 class="text-rainbow">' . $message . '</h3>';
                        Session::put('message', null);
                        // If message not empty -> make empty
                    }
                    @endphp
                    <div class="flat-form box-login-social">
                        <div class="box-title-login">
                            <h5>Login with social</h5>
                        </div>
                        <ul>
                            <li>
                                <a href="#" class="sc-button style-2 fl-button pri-3">
                                    <i class="icon-fl-google-2"></i>
                                    <span>Google</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('facebook.login') }}" class="sc-button style-2 fl-button pri-3" data-auto-logout-link="true" data-use-continue-as="false">
                                    <i class="icon-fl-facebook"></i>
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/sign-up') }}" class="sc-button style-2 fl-button pri-3">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Sign up</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="flat-form box-login-email">
                        <div class="box-title-login">
                            <h5>Or login with email</h5>
                        </div>

                        <div class="form-inner">
                            <form action="{{URL::to('/login-success')}}" id="contactform" method="POST">
                                {{ csrf_field() }}
                                <input id="email" name="user_email" tabindex="1" value="<?php echo Session::get('user_email') ?>" aria-required="true" required type="email"
                                    placeholder="Your Email Address">
                                <input id="password" name="password" tabindex="1" value="<?php echo Session::get('password') ?>" aria-required="true" type="password"
                                    placeholder="Your Password" required>
                                <div class="row-form style-1">
                                    <label>Remember me
                                        <input type="checkbox">
                                        <span class="btn-checkbox"></span>
                                    </label>
                                    <a href="#" class="forgot-pass">Forgot Password ?</a>
                                </div>

                                <button class="submit login-success">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
