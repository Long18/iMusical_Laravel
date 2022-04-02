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
    $total_price = Session::get('total_price');
    $user_name = Session::get('user_name');
    $user_email = Session::get('user_email');
    ?>

    <!-- title page -->
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Checkout</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tf-create-item tf-section">
        <div class="themesflat-container">
            <div class="row">




                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <h4 class="title-create-item">Preview item</h4>


                    @if ((array) session('cart'))
                        @foreach ((array) session('cart') as $cart_item)
                            <div class="sc-card-product">
                                @php
                                    $priceItem = $cart_item['product_price'];
                                @endphp
                                <div class="card-media" style="padding-bottom: 3rem">
                                    <a href="item-details.html"><img
                                            src="{{ asset('public/frontend//images/box-item/image-box-6.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like"> 100</span></button>
                                    <div class="featured-countdown">
                                        <span class="slogan"></span>
                                        <span class="js-countdown" data-timer="716400"
                                            data-labels=" :  ,  : , : , "></span>
                                    </div>
                                </div>
                                <div class="card-title">
                                    <h5><a
                                            href="{{ URL::to('/item-detail/' . $cart_item['product_id']) }}">{{ $cart_item['product_name'] }}</a>
                                    </h5>
                                    {{-- <div class="tags">bsc</div> --}}
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend//images/avatar/avt-9.jpg') }}"
                                                alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Brand</span>
                                            <h6> <a href="#">{{ $cart_item['product_brand'] }}</a></h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        {{-- <span>Current Bid</span> --}}
                                        <h5>{{ number_format($priceItem, 0, ',', '.') }} VND</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="{{ URL::to('/delete-cart/' . $cart_item['session_id']) }}"
                                        class="sc-button style bag fl-button pri-3"><span>Delete this product</span></a>
                                </div>
                            </div>
                        @endforeach
                    @endif



                </div>

                <div class="col-xl-9 col-lg-6 col-md-12 col-12">
                    <div class="form-create-item">

                        <form action="{{ URL::to('/save-order') }}" method="POST">
                            @csrf
                            <div class="flat-tabs tab-create-item">
                                <h4 class="title-create-item">Select method</h4>
                                <ul class="menu-tab tabs">
                                    <li class="tablinks active"><span class="icon-fl-tag"></span>Information</li>
                                    <li class="tablinks"><span class="icon-fl-bag"></span>Address</li>
                                    <li class="tablinks"><span class="icon-fl-discount"></span>Payment</li>
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="title-create-item">Email</h4>
                                                <input required type="email" name="order_email" value="{{ $user_email }}"
                                                    placeholder="Enter your email">
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="title-create-item">Name</h4>
                                                <input required type="text" name="order_name" placeholder="Enter your name"
                                                    value="{{ $user_name }}">
                                            </div>
                                        </div>

                                        <h4 class="title-create-item" style="padding-top: 3rem">Phone</h4>
                                        <input required type="number" name="order_phone"
                                            placeholder="Enter your phone number">

                                        <h4 class="title-create-item" style="padding-top: 3rem">Description</h4>
                                        <textarea name="order_description" placeholder="e.g. “This is very limited item, I need...”"></textarea>

                                        {{-- <div class="row-form style-3">
                                            <div class="inner-row-form">
                                                <h4 class="title-create-item">Royalties</h4>
                                                <input type="text" placeholder="5%">
                                            </div>

                                            <div class="inner-row-form">
                                                <h4 class="title-create-item">Size</h4>
                                                <input type="text" placeholder="e.g. “size”">
                                            </div>

                                            <div class="inner-row-form style-2">
                                                <div class="seclect-box">
                                                    <div id="item-create" class="dropdown">
                                                        <a href="#" class="btn-selector nolink">Abstraction</a>
                                                        <ul>
                                                            <li><span>Art</span></li>
                                                            <li><span>Music</span></li>
                                                            <li><span>Domain Names</span></li>
                                                            <li><span>Virtual World</span></li>
                                                            <li><span>Trading Cards</span></li>
                                                            <li><span>Sports</span></li>
                                                            <li><span>Utility</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="content-inner">
                                        <h4 class="title-create-item">Street address</h4>
                                        <input type="text" required name="order_address" placeholder="Enter your address">
                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="title-create-item">Starting date</h5>
                                                <input type="date" name="bid_starting_date" id="bid_starting_date"
                                                    class="form-control" min="1997-01-01">
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="title-create-item">Expiration date</h4>
                                                <input type="date" name="bid_expiration_date" id="bid_expiration_date"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <h4 class="title-create-item">Title</h4>
                                        <input type="text" placeholder="Item Name">

                                        <h4 class="title-create-item">Description</h4>
                                        <textarea placeholder="e.g. “This is very limited item”"></textarea> --}}


                                        {{-- <div class="inner-row-form style-2">
                                            <div class="seclect-box">
                                                <div id="item-create" class="dropdown">
                                                    <a href="#" class="btn-selector nolink">State / Province / Region</a>
                                                    <ul>
                                                        <li><span>Art</span></li>
                                                        <li><span>Music</span></li>
                                                        <li><span>Domain Names</span></li>
                                                        <li><span>Virtual World</span></li>
                                                        <li><span>Trading Cards</span></li>
                                                        <li><span>Sports</span></li>
                                                        <li><span>Utility</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="row" style="padding-top: 3rem">
                                            <div class="col-md-6">
                                                <h4 class="title-create-item">City</h4>
                                                <div class="inner-row-form style-2">
                                                    <div class="seclect-box">
                                                        <div id="item-create2" class="dropdown">
                                                            <a href="#" class="btn-selector nolink">--- Pick A City
                                                                ---</a>
                                                            <ul>
                                                                <li><span>Art</span></li>
                                                                <li><span>Music</span></li>
                                                                <li><span>Domain Names</span></li>
                                                                <li><span>Virtual World</span></li>
                                                                <li><span>Trading Cards</span></li>
                                                                <li><span>Sports</span></li>
                                                                <li><span>Utility</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="title-create-item">State / Province /
                                                    Region</h4>
                                                <div class="inner-row-form style-2">
                                                    <div class="seclect-box">
                                                        <div id="item-create" class="dropdown">
                                                            <a href="#" class="btn-selector nolink">--- Pick A Province
                                                                ---</a>
                                                            <ul>
                                                                <li><span>Art</span></li>
                                                                <li><span>Music</span></li>
                                                                <li><span>Domain Names</span></li>
                                                                <li><span>Virtual World</span></li>
                                                                <li><span>Trading Cards</span></li>
                                                                <li><span>Sports</span></li>
                                                                <li><span>Utility</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="title-create-item" style="padding-top: 3rem">Zip Code</h4>
                                                <input type="number" name="order_zip_code"
                                                    placeholder="Enter your zip code">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="content-inner">
                                        {{-- <h4 class="title-create-item">Price</h4>
                                        <input type="text" placeholder="Enter price for one item (ETH)">

                                        <h4 class="title-create-item">Minimum bid</h4>
                                        <input type="text" placeholder="enter minimum bid">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="title-create-item">Starting date</h5>
                                                <input type="date" name="bid_starting_date" id="bid_starting_date2"
                                                    class="form-control" min="1997-01-01">
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="title-create-item">Expiration date</h4>
                                                <input type="date" name="bid_expiration_date" id="bid_expiration_date2"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <h4 class="title-create-item">Title</h4>
                                        <input type="text" placeholder="Item Name">

                                        <h4 class="title-create-item">Description</h4>
                                        <textarea placeholder="e.g. “This is very limited item”"></textarea> --}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="title-create-item">Items</h4>
                                                <input disabled type="text" name="order_items_price" value="200VND">
                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="title-create-item">Shipping & handling</h4>
                                                <input disabled type="text" name="order_shipping_fee" value="200VND">
                                            </div>
                                        </div>

                                        <div class="row" style="padding-top: 3rem">
                                            <div class="col-md-6">
                                                <h5 class="title-create-item">Add a gift card, promotion code, or
                                                    voucher
                                                </h5>
                                                <input type="text" name="order_code" value="Enter code">

                                            </div>
                                            <div class="col-md-6" style="padding-top: 4.5rem">

                                                <input type="button" value="Apply">
                                            </div>
                                        </div>

                                        <div class="row" style="padding-bottom: 3rem; padding-top: 3rem">
                                            <div class="col-md-6">
                                                <h5 class="title-create-item">Select a payment method
                                                </h5>

                                                <div class="inner-row-form style-2">
                                                    <div class="seclect-box">
                                                        <div id="item-create3" class="dropdown">
                                                            {{-- <input type="text" name="order_payment_method" class="btn-selector nolink"
                                                            name="order_payment_method" id="order_payment_method" value="a"
                                                                placeholder="--- Select a payment method ---">
                                                                <a href="#" class="btn-selector nolink"
                                                                name="order_payment_method" id="order_payment_method">--- More payment
                                                                options
                                                                ---</a>
                                                            <ul>
                                                                <li><span class='bi bi-wallet'>Momo</span></li>
                                                                <li><span class='bi bi-paypal'>Paypal</span></li>
                                                                <li><span class='bi bi-cash-stack'>Cash</span></li>
                                                            </ul> --}}

                                                            <input type="checkbox" name="order_payment_method" value="Momo">
                                                            <span class='bi bi-wallet' for="order_payment_method">
                                                                Momo</span>
                                                            <input type="checkbox" name="order_payment_method"
                                                                value="Paypal">
                                                            <span class='bi bi-paypal' for="order_payment_method">
                                                                Paypal</span>
                                                            <input type="checkbox" name="order_payment_method" value="Cash">
                                                            <span class='bi bi-cash-stack' for="order_payment_method">
                                                                Cash</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        @if (Session::get('cart') != null)
                                            <div class="form-inner" style="padding-top: 3rem">
                                                <button class="tf-button-submit mg-t-15 submit" type="submit"
                                                    name="place_order" value="Place your order">Place your
                                                    order</button>
                                            </div>
                                        @else
                                            <div class="form-inner" style="padding-top: 3rem">
                                                <span href="{{ URL::to('/') }}" class="text-alert">Place some
                                                    products</span>
                                            </div>
                                        @endif



                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
