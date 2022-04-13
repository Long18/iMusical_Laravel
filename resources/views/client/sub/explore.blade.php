@extends('client.main.welcome')
@section('content')
<?php

use Illuminate\Support\Facades\Session;
use App\Models\Product;

?>


<!-- title page -->
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Product</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="{{ URL::to('/') }}">Home</a></li>
                        <li>Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tf-explore tf-section">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div id="side-bar" class="side-bar style-3">
                    <div class="widget widget-category mgbt-24 boder-bt">
                        <div class="title-wg-category">
                            <h4 class="title-widget style-2">Brands</h4>
                            <i class="icon-fl-down-2"></i>
                        </div>
                        <div class="content-wg-category">
                            <form action="#">
                                <?php
                                if ($brands) {
                                    foreach ($brands as $brand) {
                                ?>
                                        <label>{{ $brand->brand_name }}
                                            <input type="checkbox">
                                            <span class="btn-checkbox"></span>
                                        </label><br>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="widget widget-category mgbt-24 boder-bt">
                        <div class="title-wg-category">
                            <h4 class="title-widget style-2">Categories</h4>
                            <i class="icon-fl-down-2"></i>
                        </div>
                        <div class="content-wg-category">
                            <form action="#">
                                <?php
                                if ($categories) {
                                    foreach ($categories as $category) {
                                ?>
                                        <label><?php echo $category->type_name; ?>
                                            <input type="checkbox">
                                            <span class="btn-checkbox"></span>
                                        </label><br>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-12">
                <div class="box-epxlore">


                    @if ($products)
                    @foreach ($products as $product)
                    @php
                    $image = $product->getImg();
                    $brand = $product->getBrand();
                    $priceNPriceSale = Product::formatPriceToVND($product);
                    @endphp


                    <div class="sc-card-product explode style2 mg-bt">
                        <div class="card-media">
                            <a href="{{ URL::to('/item-detail/' . $product->product_id) }}"><img src="
                                                            @if ($image) {{ $image->product_img_name }}
                                                        @else
                                                        {{ asset('public/frontend/images/box-item/img-collection24.jpg') }} @endif
                                                            " alt="Image"></a>
                            {{-- <div class="coming-soon">coming soon</div> --}}
                            <button class="wishlist-button heart"><span class="number-like">
                                    {{rand(10,1000)}}</span></button>
                        </div>
                        <div class="card-title">
                            <h5><a href="{{ URL::to('/item-detail/' . $product->product_id) }}">
                                    {{ $product->product_name }}</a>
                            </h5>
                        </div>
                        <div class="meta-info">
                            <div class="author">
                                <div class="avatar">
                                    <img src="{{ asset('public/frontend/images/avatar/avt-2.jpg') }}" alt="Image">
                                </div>
                                <div class="info">
                                    <span>Brand</span>
                                    <h6> <a href="author02.html">{{ $brand->brand_name }}</a> </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-bottom style-explode">
                            <div class="price">
                                <span style="padding-right: 1rem;"> <?php echo $priceNPriceSale->priceSale; ?>:</span>
                                <div class="price-details">
                                    <h5> <?php echo $priceNPriceSale->price; ?> </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="btn-auction center">
                    <a href="#" class="sc-button loadmore fl-button pri-3"><span>Load More</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection