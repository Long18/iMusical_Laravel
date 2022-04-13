@extends('client.main.welcome')
@section('content')
    <?php

    use Illuminate\Support\Facades\Session;
    use App\Models\Product;
    use App\Models\TypeDetail;

    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">' . $message . '</span>';
        Session::put('message', null);
        // If message not empty -> make empty
    }

    ?>
    <!-- title page -->
    <?php
    $name_creater = $product->getCreator();
    $brand = $product->getBrand();
    ?>
    <section class="flat-title-page inner">
        {{ csrf_field() }}
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <?php $priceNPriceSale = Product::formatPriceToVND($product); ?>
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">{{ $product->product_name }}</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="{{ URL::to('/') }}">Home</a></li>
                            <li><a href="{{ URL::to('/explore') }}">Product</a></li>
                            <li>{{ $product->product_name }}</li>
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
if ($images) {
    echo $images->values()->get(0)->product_img_name;
} else {
    echo 'public/frontend/images/box-item/nonImage.png';
} ?>" alt="{{ $product->product_name }}" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="content-right">
                        <div class="sc-item-details">
                            <h2 class="style2">{{ $product->product_name }}</h2>
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
                                            <h6> <a
                                                    href="{{ URL::to('/user/' . $name_creater->user_id) }}">{{ $name_creater->user_name }}</a>
                                            </h6>
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
                                            <h6> <a
                                                    href="{{ URL::to('/user/' . $name_creater->user_id) }}">{{ $name_creater->user_name }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{{ $product->product_detail }}</p>
                            <div class="meta-item-details style2">
                                <div class="item meta-price">
                                    <span class="heading"></span>
                                    <div class="price">
                                        <div class="price-box">
                                            <h5> <?php echo $priceNPriceSale->price; ?> </h5>
                                            <span> <?php echo '' . $priceNPriceSale->priceSale . ''; ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item count-down">
                                    <span class="heading style-2">Countdown</span>
                                    <span class="js-countdown" data-timer="416400" data-labels=" :  ,  : , : , "></span>
                                </div>
                            </div>


                            <a href="#" data-id="{{ $product->product_id }}" data-toggle="modal" name="add-to-cart"
                                data-target="#popup_bid"
                                class="sc-button loadmore style bag fl-button pri-3 add-to-cart"><span>Add to
                                    cart</span></a>

                            <div class="flat-tabs themesflat-tabs">
                                <ul class="menu-tab tab-title">
                                    <li class="item-title">
                                        <span class="inner">Info</span>
                                    </li>
                                    <li class="item-title">
                                        <span class="inner">Detail</span>
                                    </li>
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner tab-content">
                                        <ul class="bid-history-list">
                                            <?php
                                        if ($typeDetails) {
                                            foreach ($typeDetails as $typeDetail) {
                                        ?>
                                            <li>
                                                <h1><?php echo $typeDetail->getType->type_name; ?>: </h1>
                                                <span><?php echo $typeDetail->type_detail_value; ?></span>
                                            </li>
                                            <?php
                                            }
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="content-inner tab-content">
                                        <div class="provenance">
                                            <p>
                                                {{ $product->product_detail }}
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
                            Another Images</h2>
                        <a href="explore-3.html" class="exp">EXPLORE MORE</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="swiper-container show-shadow carousel pad-t-24 auctions">
                        <div class="swiper-wrapper">

                            <?php
                        if ($images) {
                            foreach ($images as $image) {
                        ?>
                            <div class="swiper-slide">
                                <div class="slider-item">
                                    <div class="sc-card-product">
                                        <div class="card-media">
                                            <a href="#"><img src="/<?php
if ($image) {
    echo $image->product_img_name;
} else {
    echo 'public/frontend/images/box-item/nonImage.png';
} ?>" alt="Image"></a>

                                        </div>
                                    </div><!-- item-->
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                            <div class="swiper-pagination mg-t-12"></div>
                            <div class="swiper-button-next btn-slide-next active"></div>
                            <div class="swiper-button-prev btn-slide-prev"></div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
