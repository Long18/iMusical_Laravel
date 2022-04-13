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
                        <h1 class="heading text-center">Result Search
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li>Result</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($search->count() == 0)
        <section class="tf-no-result tf-section">
            <div class="themesflat-container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tf-title-heading ct style-2 fs-30 mg-bt-10">
                            Sorry, We Couldn’t Find Any Results For This Search.
                        </h2>
                        <h5 class="sub-title help-center mg-bt-32 ">
                        </h5>
                        <form action="{{ URL::to('/search') }}" class="help-center-form" method="POST" role="search">
                            @csrf
                            <input type="text" placeholder="Type your question here" required>
                            <button>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_1241_902" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="1" y="0"
                                        width="25" height="24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M24.666 1.3335H2.23912V23.2653H24.666V1.3335Z" fill="white" stroke="white" />
                                    </mask>
                                    <g mask="url(#mask0_1241_902)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.4518 3.02254C18.6829 3.02254 22.9387 7.18324 22.9387 12.2988C22.9387 17.4144 18.6829 21.5762 13.4518 21.5762C8.22183 21.5762 3.96601 17.4144 3.96601 12.2988C3.96601 7.18324 8.22183 3.02254 13.4518 3.02254ZM13.4519 23.2653C19.6353 23.2653 24.666 18.3456 24.666 12.2988C24.666 6.25201 19.6353 1.3335 13.4519 1.3335C7.2685 1.3335 2.23889 6.25201 2.23889 12.2988C2.23889 18.3456 7.2685 23.2653 13.4519 23.2653Z"
                                            fill="white" />
                                        <path
                                            d="M13.4518 2.52254C18.9484 2.52254 23.4387 6.89655 23.4387 12.2988H22.4387C22.4387 7.46993 18.4174 3.52254 13.4518 3.52254V2.52254ZM23.4387 12.2988C23.4387 17.701 18.9485 22.0762 13.4518 22.0762V21.0762C18.4174 21.0762 22.4387 17.1278 22.4387 12.2988H23.4387ZM13.4518 22.0762C7.95623 22.0762 3.46601 17.701 3.46601 12.2988H4.46601C4.46601 17.1278 8.48742 21.0762 13.4518 21.0762V22.0762ZM3.46601 12.2988C3.46601 6.89659 7.95631 2.52254 13.4518 2.52254V3.52254C8.48734 3.52254 4.46601 7.46989 4.46601 12.2988H3.46601ZM13.4519 22.7653C19.3697 22.7653 24.166 18.059 24.166 12.2988H25.166C25.166 18.6322 19.9008 23.7653 13.4519 23.7653V22.7653ZM24.166 12.2988C24.166 6.53869 19.3698 1.8335 13.4519 1.8335V0.833496C19.9007 0.833496 25.166 5.96533 25.166 12.2988H24.166ZM13.4519 1.8335C7.53406 1.8335 2.73889 6.53862 2.73889 12.2988H1.73889C1.73889 5.9654 7.00294 0.833496 13.4519 0.833496V1.8335ZM2.73889 12.2988C2.73889 18.0591 7.53412 22.7653 13.4519 22.7653V23.7653C7.00288 23.7653 1.73889 18.6322 1.73889 12.2988H2.73889Z"
                                            fill="white" />
                                    </g>
                                    <mask id="mask1_1241_902" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                        y="18" width="8" height="8">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.11719 19.02H1.33216V24.6668H7.11719V19.02Z" fill="white" stroke="white" />
                                    </mask>
                                    <g mask="url(#mask1_1241_902)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.19553 24.6668C2.41546 24.6668 2.63654 24.5846 2.8058 24.4202L6.86358 20.4633C7.20096 20.1334 7.20211 19.5985 6.86473 19.2686C6.5285 18.9364 5.98155 18.9387 5.64302 19.2663L1.58525 23.2243C1.24787 23.5543 1.24672 24.088 1.5841 24.4179C1.75221 24.5846 1.97444 24.6668 2.19553 24.6668Z"
                                            fill="white" />
                                        <path
                                            d="M2.19553 24.6668C2.41546 24.6668 2.63654 24.5846 2.8058 24.4202L6.86358 20.4633C7.20096 20.1334 7.20211 19.5985 6.86473 19.2686C6.5285 18.9364 5.98155 18.9387 5.64302 19.2663L1.58525 23.2244C1.24787 23.5543 1.24672 24.088 1.5841 24.4179C1.75221 24.5846 1.97444 24.6668 2.19553 24.6668"
                                            stroke="white" />
                                    </g>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="tf-section live-auctions result mobie-style">
            <div class="themesflat-container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="tf-title">
                            Product found: {{ $search->count() }} Items</h2>
                        <div class="heading-line"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="swiper-container show-shadow carousel pad-t-20 auctions">
                            <div class="swiper-wrapper">
                                @foreach ($search as $key => $product)
                                    @php
                                        $image = $product->getImg();
                                        $name_creater = $product->getCreator();
                                        $brand = $product->getBrand();
                                        $priceNPriceSale = Product::formatPriceToVND($product);
                                    @endphp


                                    <input type="hidden" name="cart_product_id" value="{{ $product->product_id }}"
                                        class="cart_product_id_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_name" value="{{ $product->product_name }}"
                                        class="cart_product_name_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_price" value="{{ $product->product_price }}"
                                        class="cart_product_price_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_sale_price"
                                        value="{{ $product->product_sale_price }}"
                                        class="cart_product_sale_price_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_quantity" value="1"
                                        class="cart_product_quantity_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_created_by"
                                        value="{{ $product->created_by }}"
                                        class="cart_product_created_by_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_brand" value="{{ $brand->brand_name }}"
                                        class="cart_product_brand_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_image" value="
                                                                        @if ($image) {{ $image->product_img_name }}
                                @else
                                public/frontend/images/box-item/nonImage.png @endif
                                                                                    "
                                        class="cart_product_image_{{ $product->product_id }}">
                                    <input type="hidden" name="cart_product_author"
                                        value="{{ $name_creater->user_name }}"
                                        class="cart_product_author_{{ $product->product_id }}">

                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media">
                                                    <a href="{{ URL::to('/item-detail/' . $product->product_id) }}"><img
                                                            src="/<?php
                                                            if ($image) {
                                                                echo $image->product_img_name;
                                                            } else {
                                                                echo 'public/frontend/images/box-item/nonImage.png';
                                                            }

                                                            ?>"
                                                            alt="{{ $product->product_name }}"></a>
                                                    <button class="wishlist-button heart"><span class="number-like">
                                                            {{ rand(10, 1000) }}</span></button>
                                                    <div class="featured-countdown">
                                                        <span class="slogan"></span>
                                                        <span class="js-countdown" data-timer="516400"
                                                            data-labels=" :  ,  : , : , "></span>
                                                    </div>
                                                    <div class="button-place-bid">
                                                        <button href="#" data-id="{{ $product->product_id }}"
                                                            name="add-to-cart" type="button"
                                                            class="sc-button style-place-bid style bag fl-button pri-3 add-to-cart"><span>
                                                                Add to Cart </span></button>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h5 class="style2"><a
                                                            href="{{ URL::to('/item-detail/' . $product->product_id) }}">{{ $product->product_name }}</a>
                                                    </h5>
                                                    {{-- <div class="tags">bsc</div> --}}
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="
                                                                                            /<?php
                                                                                            if ($name_creater->user_image) {
                                                                                                echo $name_creater->user_image;
                                                                                            } else {
                                                                                                echo 'public/frontend/images/box-item/nonImage.png';
                                                                                            }

                                                                                            ?>
                                                                                            " alt="Image">
                                                        </div>
                                                        <div class="info">
                                                            <span>Creator</span>
                                                            <h6 class="style2"><a
                                                                    href="{{ URL::to('/user/' . $name_creater->user_id) }}">{{ $name_creater->user_name }}</a>
                                                            </h6>
                                                            </a> </h6>
                                                        </div>
                                                    </div>
                                                    <div class="price">
                                                        <span> <?php echo $priceNPriceSale->priceSale; ?>  </span>
                                                        <h5> <?php echo $priceNPriceSale->price; ?> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                @endforeach
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next btn-slide-next"></div>
                                <div class="swiper-button-prev btn-slide-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endif
@endsection
