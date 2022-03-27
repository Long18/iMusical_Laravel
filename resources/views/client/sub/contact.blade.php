@extends('client.main.welcome')
@section('content')
    <?php

    use Illuminate\Support\Facades\Session;
    use App\Models\Product;

    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">' . $message . '</span>';
        Session::put('message', null);
        // If message not empty -> make empty
    }
    ?>

<!-- title page -->
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Contact</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="{{ URL::to('/')}}">Home</a></li>
                        <li><a href="#">Contact</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tf-contact tf-section">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="box-feature-contact">
                    <img src="{{ asset('public/frontend/images/blog/thumb-8.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <h2 class="tf-title-heading style-2 mg-bt-12">
                    Send us a message
                </h2>
                <h5 class="sub-title style-1">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                </h5>
                <div class="form-inner">
                    <form action=""  method="post" id="contactform" novalidate="novalidate" class="form-submit">
                        <input id="name" name="name" tabindex="1" value="" aria-required="true" required type="text" placeholder="Your Full Name">
                        <input id="email" name="email" tabindex="2"  value="" aria-required="true" required type="email" placeholder="Your Email Address">
                        <div class="row-form style-2" id="subject">
                            <select>
                                <option value="1">Select subject</option>
                                <option value="2">Select subject</option>
                                <option value="3">Select subject</option>
                            </select>
                            <i class="icon-fl-down"></i>
                        </div>
                        <textarea id="message" name="message" tabindex="3" aria-required="true" required placeholder="Message"></textarea>
                        <button class="submit">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
