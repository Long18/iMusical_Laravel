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
    @if ($newProducts)
        @foreach ($newProducts as $key => $item_value)
            @php
                $image = $item_value->getImgs();
                $name_creater = $item_value->getCreator();
                $brand = $item_value->getBrand();
            @endphp
            <section class="flat-title-page inner">
                {{ csrf_field() }}
                <div class="overlay"></div>
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php $priceNPriceSale = Product::formatPriceToVND($item_value); ?>
                            <div class="page-title-heading mg-bt-12">
                                <h1 class="heading text-center">{{ $item_value->product_name }}</h1>
                            </div>
                            <div class="breadcrumbs style2">
                                <ul>
                                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                                    <li><a href="{{ URL::to('/explore') }}">Explore</a></li>
                                    <li>{{ $item_value->product_name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- tf item details -->
            <div class="tf-section tf-item-details">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <div class="content-left">
                                <div class="media">
                                    <img src="/<?php
                                    if ($image) {
                                        echo $image->product_img_name;
                                    } else {
                                        echo 'public/frontend/images/box-item/nonImage.png';
                                    }

                                    ?>" alt="{{$item_value->product_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="content-right">
                                <div class="sc-item-details">
                                    <h2 class="style2">{{ $item_value->product_name }}</h2>
                                    <div class="meta-item">
                                        <div class="left">
                                            <span class="viewed eye">225</span>
                                            <span class="liked heart wishlist-button mg-l-8"><span
                                                    class="number-like">100</span></span>
                                        </div>
                                        <div class="right">
                                            <a href="#" class="share"></a>
                                            <a class="option"></a>
                                        </div>
                                    </div>
                                    <div class="client-infor sc-card-product">
                                        <div class="meta-info">
                                            <div class="author">
                                                <div class="avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-8.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="info">
                                                    <span>Owned By</span>
                                                    <h6> <a href="{{ URL::to('/user/' . $name_creater->user_id) }}">{{ $name_creater->user_name }}</a> </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="meta-info">
                                            <div class="author">
                                                <div class="avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-2.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="info">
                                                    <span>Create By</span>
                                                    <h6> <a href="{{ URL::to('/user/' . $name_creater->user_id) }}">{{ $name_creater->user_name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ $item_value->product_detail }}</p>
                                    <div class="meta-item-details style2">
                                        <div class="item meta-price">
                                            <span class="heading"></span>
                                            <div class="price">
                                                <div class="price-box">
                                                    <h5> {{ $priceNPriceSale->price }} </h5>
                                                    <span> <?php echo '' . $priceNPriceSale->priceSale . ''; ?> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item count-down">
                                            <span class="heading style-2">Countdown</span>
                                            <span class="js-countdown" data-timer="416400"
                                                data-labels=" :  ,  : , : , "></span>
                                        </div>
                                    </div>


                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button loadmore style bag fl-button pri-3"><span>Add to
                                            cart</span></a>
                                    <div class="flat-tabs themesflat-tabs">
                                        <ul class="menu-tab tab-title">
                                            <li class="item-title">
                                                <span class="inner">Info</span>
                                            </li>
                                            <li class="item-title">
                                                <span class="inner">Provenance</span>
                                            </li>
                                        </ul>
                                        <div class="content-tab">
                                            <div class="content-inner tab-content">
                                                <ul class="bid-history-list">
                                                    <li>
                                                        <div class="content">
                                                            <div class="client">
                                                                <div class="sc-author-box style-2">
                                                                    <div class="author-avatar">
                                                                        <a href="#">
                                                                            <img src="{{ asset('public/frontend/images/avatar/avt-3.jpg') }}"
                                                                                alt="" class="avatar">
                                                                        </a>
                                                                        <div class="badge"></div>
                                                                    </div>
                                                                    <div class="author-infor">
                                                                        <div class="name">
                                                                            <h6> <a href="author02.html">
                                                                                    {{-- {{ $name_creater->user_name }} --}}
                                                                                </a>
                                                                            </h6>
                                                                            <span> place a bid</span>
                                                                        </div>
                                                                        <span class="time">8 hours ago</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="content-inner tab-content">
                                                <div class="provenance">
                                                    <p>
                                                        {{ $item_value->product_detail }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- /tf item details -->

            <section class="tf-section live-auctions item-details pad-b-74 mobie-style">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-live-auctions">
                                <h2 class="tf-title">
                                    Live Auctions</h2>
                                <a href="explore-3.html" class="exp">EXPLORE MORE</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="swiper-container show-shadow carousel pad-t-24 auctions">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media">
                                                    <a href="item-details.html"><img
                                                            src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}"
                                                            alt="Image"></a>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            100</span></button>
                                                    <div class="featured-countdown">
                                                        <span class="slogan"></span>
                                                        <span class="js-countdown" data-timer="516400"
                                                            data-labels=" :  ,  : , : , "></span>
                                                    </div>
                                                    <div class="button-place-bid">
                                                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                            class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                                Bid</span></a>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h5><a href="item-details.html">"Hamlet Contemplates Contemplates
                                                            "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-11.jpg') }}"
                                                                alt="Image">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6> <a href="author02.html">SalvadorDali
                                                                </a> </h6>
                                                        </div>
                                                    </div>
                                                    <div class="price">
                                                        <span>Current Bid</span>
                                                        <h5> 4.89 ETH</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media active">
                                                    <a href="item-details.html"><img
                                                            src="{{ asset('public/frontend/images/box-item/image-box-10.jpg') }}"
                                                            alt="Image"></a>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            220</span></button>
                                                    <div class="featured-countdown">
                                                        <span class="slogan"></span>
                                                        <span class="js-countdown" data-timer="81640"
                                                            data-labels=" :  ,  : , : , "></span>
                                                    </div>
                                                    <div class="button-place-bid">
                                                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                            class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                                Bid</span></a>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h5 class="style2"><a href="item-details.html">"Triumphant
                                                            Awakening
                                                            Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}"
                                                                alt="Image">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6> <a href="author02.html">Trista Francis</a> </h6>
                                                        </div>
                                                    </div>
                                                    <div class="price">
                                                        <span>Current Bid</span>
                                                        <h5> 4.89 ETH</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media">
                                                    <a href="item-details.html"><img
                                                            src="{{ asset('public/frontend/images/box-item/image-box-11.jpg') }}"
                                                            alt="Image"></a>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            90</span></button>
                                                    <div class="featured-countdown">
                                                        <span class="slogan"></span>
                                                        <span class="js-countdown" data-timer="316400"
                                                            data-labels=" :  ,  : , : , "></span>
                                                    </div>
                                                    <div class="button-place-bid">
                                                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                            class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                                Bid</span></a>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h5 class="style2"><a href="item-details.html">"Living Vase
                                                            01 by
                                                            Lanza
                                                            Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-13.jpg') }}"
                                                                alt="Image">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6> <a href="author02.html">Freddie Carpenter</a> </h6>
                                                        </div>
                                                    </div>
                                                    <div class="price">
                                                        <span>Current Bid</span>
                                                        <h5> 4.89 ETH</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media">
                                                    <a href="item-details.html"><img
                                                            src="{{ asset('public/frontend/images/box-item/image-box-21.jpg') }}"
                                                            alt="Image"></a>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            145</span></button>
                                                    <div class="featured-countdown">
                                                        <span class="slogan"></span>
                                                        <span class="js-countdown" data-timer="716400"
                                                            data-labels=" :  ,  : , : , "></span>
                                                    </div>
                                                    <div class="button-place-bid">
                                                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                            class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                                Bid</span></a>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h5 class="style2"><a href="item-details.html">"Flame
                                                            Dress' by
                                                            Balmain
                                                            Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-14.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6> <a href="author02.html">Tyler Covington</a> </h6>
                                                        </div>
                                                    </div>
                                                    <div class="price">
                                                        <span>Current Bid</span>
                                                        <h5> 4.89 ETH</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media">
                                                    <a href="item-details.html"><img
                                                            src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}"
                                                            alt="Image"></a>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            100</span></button>
                                                    <div class="featured-countdown">
                                                        <span class="slogan"></span>
                                                        <span class="js-countdown" data-timer="516400"
                                                            data-labels=" :  ,  : , : , "></span>
                                                    </div>
                                                    <div class="button-place-bid">
                                                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                            class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                                Bid</span></a>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h5><a href="item-details.html">"Hamlet Contemplates Contemplates
                                                            "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-11.jpg') }}"
                                                                alt="Image">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6> <a href="author02.html">SalvadorDali
                                                                </a> </h6>
                                                        </div>
                                                    </div>
                                                    <div class="price">
                                                        <span>Current Bid</span>
                                                        <h5> 4.89 ETH</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media">
                                                    <a href="item-details.html"><img
                                                            src="{{ asset('public/frontend/images/box-item/image-box-10.jpg') }}"
                                                            alt="Image"></a>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            220</span></button>
                                                    <div class="featured-countdown">
                                                        <span class="slogan"></span>
                                                        <span class="js-countdown" data-timer="81640"
                                                            data-labels=" :  ,  : , : , "></span>
                                                    </div>
                                                    <div class="button-place-bid">
                                                        <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                            class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                                Bid</span></a>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h5 class="style2"><a href="item-details.html">"Triumphant
                                                            Awakening
                                                            Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}"
                                                                alt="Image">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6> <a href="author02.html">Trista Francis</a> </h6>
                                                        </div>
                                                    </div>
                                                    <div class="price">
                                                        <span>Current Bid</span>
                                                        <h5> 4.89 ETH</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>

                                    <form action="" method="POST">
                                        {{ csrf_field() }}
                                        <div class="swiper-slide">
                                            <div class="slider-item">
                                                <div class="sc-card-product">
                                                    <div class="card-media">
                                                        <a href="item-details.html"><img
                                                                src="{{ asset('public/frontend/images/box-item/image-box-11.jpg') }}"
                                                                alt="Image"></a>
                                                        <button class="wishlist-button heart"><span
                                                                class="number-like">
                                                                90</span></button>
                                                        <div class="featured-countdown">
                                                            <span class="slogan"></span>
                                                            <span class="js-countdown" data-timer="316400"
                                                                data-labels=" :  ,  : , : , "></span>
                                                        </div>
                                                        <div class="button-place-bid">
                                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Add
                                                                    to cart</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="card-title">
                                                        <h5 class="style2"><a href="item-details.html">"Living
                                                                Vase 01
                                                                by
                                                                Lanza
                                                                Contemplates "</a></h5>
                                                        <div class="tags">bsc</div>
                                                    </div>
                                                    <div class="meta-info">
                                                        <div class="author">
                                                            <div class="avatar">
                                                                <img src="{{ asset('public/frontend/images/avatar/avt-13.jpg') }}"
                                                                    alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Creator</span>
                                                                <h6> <a href="author02.html">Freddie Carpenter</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            <span>Current Bid</span>
                                                            <h5> 4.899 ETH</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- item-->
                                        </div>
                                    </form>
                                </div>
                                <div class="swiper-pagination mg-t-12"></div>
                                <div class="swiper-button-next btn-slide-next active"></div>
                                <div class="swiper-button-prev btn-slide-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <form action="" method="POST">
                {{-- {{ URL::to('/show-cart') }} --}}
                @csrf


                <!-- Modal Popup Bid -->
                {{-- <div class="modal fade popup" id="popup_bid_success" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body space-y-20 pd-40">
                            <h3 class="text-center">Your Bidding
                                Successfuly Added</h3>
                            {{-- <p class="text-center">your bid <span class="price color-popup">(4ETH) </span> has been
                                listing to our database</p>
                            <a href class="btn btn-primary"> Watch the listings</a> --}}
                {{-- <button type="submit" class="btn btn-primary"> Add to cart</button>
                        </div>
                    </div>
                </div>
            </div> --}}
                @if ($newProducts)
                    @foreach ($newProducts as $product)
                        @php
                            $name_creater = $product->getCreator();
                            $brand = $product->getBrand();
                        @endphp

                        <input type="hidden" name="cart_product_id" value="{{ $item_value->product_id }}"
                            class="cart_product_id_{{ $item_value->product_id }}">
                        <input type="hidden" name="cart_product_name" value="{{ $item_value->product_name }}"
                            class="cart_product_name_{{ $item_value->product_id }}">
                        <input type="hidden" name="cart_product_price" value="{{ $item_value->product_price }}"
                            class="cart_product_price_{{ $item_value->product_id }}">
                        <input type="hidden" name="cart_product_sale_price" value="{{ $item_value->product_sale_price }}"
                            class="cart_product_sale_price_{{ $item_value->product_id }}">
                        <input type="hidden" name="cart_product_quantity" value="1"
                            class="cart_product_quantity_{{ $item_value->product_id }}">
                        <input type="hidden" name="cart_product_created_by" value="{{ $product->created_by }}"
                            class="cart_product_created_by_{{ $product->product_id }}">
                        <input type="hidden" name="cart_product_brand" value="{{ $brand->brand_name }}"
                            class="cart_product_brand_{{ $product->product_id }}">
                        <input type="hidden" name="cart_product_image" value="<?php
                        if ($image) {
                            echo $image->product_img_name;
                        } else {
                            echo 'public/frontend/images/box-item/nonImage.png';
                        }

                        ?>"
                                class=" cart_product_image_{{ $product->product_id }}">
                        <input type="hidden" name="cart_product_author" value="{{ $name_creater->user_name }}"
                            class="cart_product_author_{{ $product->product_id }}">
                    @endforeach
                @endif

                <div class="modal fade popup" id="popup_bid" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body space-y-20 pd-40">
                                <h3>{{ $item_value->product_name }}</h3>
                                {{-- <p class="text-center">You must bid at least <span class="price color-popup">4.89
                                    ETH</span>
                            </p>
                            <input type="text" class="form-control" placeholder="00.00 ETH"> --}}
                                <p>Enter quantity. <span class="color-popup">5 available</span>
                                </p>
                                <input type="number" name="quantity" class="form-control quantity" value="1">
                                <div class="hr"></div>
                                <input name="producid_hidden" type="hidden" value="{{ $item_value->product_id }}">
                                {{-- <div class="d-flex justify-content-between">
                                <p> You must bid at least:</p>
                                <p class="text-right price color-popup"> 4.89 ETH </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p> Service free:</p>
                                <p class="text-right price color-popup"> 0,89 ETH </p>
                            </div> --}}
                                <div class="d-flex justify-content-between">
                                    <p> Total amount:</p>
                                    <p class="text-right price color-popup">
                                        {{ number_format($item_value->product_price, 0, ',', '.') }} đ</p>
                                </div>
                                {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popup_bid_success"
                                data-dismiss="modal" aria-label="Close">Add to cart</a> --}}
                                <button name="add-to-cart" type="button" data-id="{{ $item_value->product_id }}"
                                    class="btn btn-primary add-to-cart"> Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        @endforeach
    @endif
@endsection
