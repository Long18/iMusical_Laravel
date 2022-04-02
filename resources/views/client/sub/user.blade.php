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
    <form action="" method="POST">
        @csrf
        <section class="flat-title-page inner">
            <div class="overlay"></div>
            <div class="themesflat-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading mg-bt-12">
                            <h1 class="heading text-center">Author</h1>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index-2.html">Home</a></li>
                                <li><a href="#">Pages</a></li>
                                <li>User</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tf-section authors">
            <div class="themesflat-container">
                <div class="flat-tabs tab-authors">
                    <div class="author-profile flex">
                        @if ($user)
                            @foreach ($user as $key => $author)
                                <div class="feature-profile">
                                    <img src="
                                        /<?php
                                        if ($author->user_image) {
                                            echo $author->user_image;
                                        } else {
                                            echo 'public/frontend/images/box-item/nonImage.png';
                                        }

                                        ?>" alt="Image" class="avatar">
                                </div>

                                <div class="infor-profile">
                                    <span>User profile</span>
                                    <h2 class="title">{{ $author->user_name }}</h2>
                                    <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Laborum
                                        obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                                </div>

                                <div class="widget-social style-3">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="style-2"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li class="mgr-none"><a href="#"><i class="icon-fl-tik-tok-2"></i></a></li>
                                    </ul>
                                    <div class="btn-profile"><a href="#" class="sc-button style-1 follow">Follow</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <ul class="menu-tab flex">
                        <li class="tablinks active">ALL</li>
                        <li class="tablinks">Product</li>
                    </ul>
                    <div class="content-tab">
                        <div class="content-inner">
                            <div class="row">
                                <!-- title page -->
                                @if ($newProducts)
                                    @foreach ($newProducts as $key => $item_value)
                                        @php
                                            $image = $item_value->getImgs();
                                            $name_creater = $item_value->getCreator();
                                            $brand = $item_value->getBrand();
                                            $priceNPriceSale = Product::formatPriceToVND($item_value);
                                        @endphp

                                        <input type="hidden" name="cart_product_id" value="{{ $item_value->product_id }}"
                                            class="cart_product_id_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_name"
                                            value="{{ $item_value->product_name }}"
                                            class="cart_product_name_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_price"
                                            value="{{ $item_value->product_price }}"
                                            class="cart_product_price_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_sale_price"
                                            value="{{ $item_value->product_sale_price }}"
                                            class="cart_product_sale_price_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_quantity" value="1"
                                            class="cart_product_quantity_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_created_by"
                                            value="{{ $item_value->created_by }}"
                                            class="cart_product_created_by_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_brand" value="{{ $brand->brand_name }}"
                                            class="cart_product_brand_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_image" value="
                                    @if ($image) {{ $image->product_img_name }}
                                @else
                                public/frontend/images/box-item/nonImage.png @endif
                                                " class="cart_product_image_{{ $item_value->product_id }}">
                                        <input type="hidden" name="cart_product_author"
                                            value="{{ $name_creater->user_name }}"
                                            class="cart_product_author_{{ $item_value->product_id }}">

                                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                            <div class="sc-card-product explode ">
                                                <div class="card-media">
                                                    <a href="{{ URL::to('/item-detail/' . $item_value->product_id) }}"><img
                                                            src="/<?php
                                                            if ($image) {
                                                                echo $image->product_img_name;
                                                            } else {
                                                                echo 'public/frontend/images/box-item/nonImage.png';
                                                            }

                                                            ?>"
                                                            alt="{{ $item_value->product_name }}"></a>
                                                    <div class="button-place-bid">
                                                        <button href="#" data-id="{{ $item_value->product_id }}"
                                                            name="add-to-cart" type="button"
                                                            class="sc-button style-place-bid style bag fl-button pri-3 add-to-cart"><span>
                                                                Add to Cart </span></button>
                                                    </div>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            {{ rand(10, 1000) }}</span></button>
                                                </div>
                                                <div class="card-title mg-bt-16">
                                                    <h5><a
                                                            href="{{ URL::to('/item-detail/' . $item_value->product_id) }}">{{ $item_value->product_name }}</a>
                                                    </h5>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6> <a href="#">{{ $name_creater->user_name }}</a> </h6>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="tags">bsc</div> --}}
                                                </div>
                                                <div class="card-bottom style-explode">
                                                    <div class="price">
                                                        {{-- <span>Current Bid</span> --}}
                                                        <div class="price-details">
                                                            <span> {{ $priceNPriceSale->priceSale }} </span>
                                                            <h5> <?php echo $priceNPriceSale->price; ?> </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="col-md-12 wrap-inner load-more text-center">
                                    <a href="#" class="sc-button loadmore fl-button pri-3"><span>Load More</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="content-inner">
                            <div class="row">

                                <div class="col-md-12 wrap-inner load-more text-center">
                                    <a href="#" class="sc-button loadmore fl-button pri-3"><span>Load More</span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>

@endsection
