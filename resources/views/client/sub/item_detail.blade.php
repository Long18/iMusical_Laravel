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

    @foreach ($item_detail as $key => $item_value)
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
                                <li><a href="{{ URL::to('/')}}">Home</a></li>
                                <li><a href="{{ URL::to('/explore')}}">Explore</a></li>
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
                                <img src="{{ asset('public/frontend/images/box-item/images-item-details.jpg') }}" alt="">
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
                                                <img src="{{ asset('public/frontend/images/avatar/avt-8.jpg') }}" alt="">
                                            </div>
                                            <div class="info">
                                                <span>Owned By</span>
                                                <h6> <a href="author02.html">Ralph Garraway</a> </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="{{ asset('public/frontend/images/avatar/avt-2.jpg') }}" alt="">
                                            </div>
                                            <div class="info">
                                                <span>Create By</span>
                                                <h6> <a href="author02.html">Freddie Carpenter</a> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>{{ $item_value->product_detail }}</p>
                                <div class="meta-item-details style2">
                                    <div class="item meta-price">
                                        <span class="heading">Current Bid</span>
                                        <div class="price">
                                            <div class="price-box">
                                                <h5> {{$priceNPriceSale->price}} </h5>
                                                <span> <?php echo ''.$priceNPriceSale->priceSale  .'';?>  </span>
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
                                    class="sc-button loadmore style bag fl-button pri-3"><span>Place a bid</span></a>
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
                                                                        <h6> <a href="author02.html">Mason Woodward </a>
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
                                                <h5><a href="item-details.html">"Hamlet Contemplates Contemplates "</a></h5>
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
                                                <h5 class="style2"><a href="item-details.html">"Living Vase 01 by
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
                                                <h5 class="style2"><a href="item-details.html">"Flame Dress' by
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
                                                <h5><a href="item-details.html">"Hamlet Contemplates Contemplates "</a></h5>
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
                                                <h5 class="style2"><a href="item-details.html">"Living Vase 01 by
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
                            </div>
                            <div class="swiper-pagination mg-t-12"></div>
                            <div class="swiper-button-next btn-slide-next active"></div>
                            <div class="swiper-button-prev btn-slide-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
