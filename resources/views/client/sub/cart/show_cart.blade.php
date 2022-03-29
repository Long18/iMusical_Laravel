@extends('client.main.welcome')
@section('content')
    @php

    use Illuminate\Support\Facades\Session;
    use App\Models\Product;

    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">' . $message . '</span>';
        Session::put('message', null);
        // If message not empty -> make empty
    }

    $totalSale = 0;
    $percentSale = 0;
    @endphp


    <!-- title page -->
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Cart</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{ URL::to('/') }}">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li>Cart</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tf-section tf-rank">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-ranking">

                        <div class="flex th-title">
                            <div class="column1">
                                <h3>Item</h3>
                            </div>
                            <div class="column">
                                <h3>Price</h3>
                            </div>
                            <div class="column">
                                <h3>Quantity</h3>
                            </div>

                            <div class="column">
                                <h3>Total</h3>
                            </div>
                            <div class="column">
                                <h3></h3>
                            </div>
                            <div class="column">
                                <h3>Option</h3>
                            </div>
                        </div>
                        @if ((array) session('cart'))
                            @foreach ((array) session('cart') as $cart_item)
                                @php
                                    if ($cart_item['product_sale_price']) {
                                        $percentSale = ((float) $cart_item['product_sale_price'] / (float) $cart_item['product_price'] - 1) * $cart_item['product_quantity'] * 100;
                                        $subTotal = $cart_item['product_sale_price'] * $cart_item['product_quantity'];
                                    } else {
                                        $subTotal = $cart_item['product_price'] * $cart_item['product_quantity'];
                                    }
                                    $totalSale = $subTotal;
                                @endphp
                                <form action="{{ URL::to('/update-cart') }}" method="POST">
                                    @csrf
                                    <div class="fl-blog fl-item2">
                                        <div class="item flex">

                                            <div class="infor-item flex column1">
                                                <input type="checkbox" name="checkbox" id="checkbox">
                                                <div class="media">
                                                    <img src="{{ asset('public/frontend/images/box-item/img1rank.jpg') }}"
                                                        alt="Images">
                                                </div>
                                                <div class="content-collection pad-t-4">
                                                    <h5 class="title mb-15"><a
                                                            href="{{ URL::to('/item-detail/' . $cart_item['product_id']) }}">{{ $cart_item['product_name'] }}</a>
                                                    </h5>
                                                    <div class="author flex">
                                                        <div class="author-avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/author_rank.jpg') }}"
                                                                alt="Images">
                                                            <div class="badge"><i class="ripple"></i></div>
                                                        </div>
                                                        <div class="content">
                                                            <p>Owned By: Smatha</p>
                                                            <h6><a href="#">Sale:
                                                                    <span
                                                                        style="color: #DF4949;">{{ number_format($percentSale) }}%</span></a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column td2">
                                                <span>{{ number_format($cart_item['product_price'], 0, ',', '.') }}
                                                    đ</span>
                                            </div>
                                            <div class="column td3">
                                                <input style="margin-left: 5rem;" type="number" name="quantity" min="1"
                                                    class="quantity" value="{{ $cart_item['product_quantity'] }}">
                                            </div>
                                            <div class="column"></div>
                                            <div class="column td3 ">
                                                <span>{{ number_format($totalSale, 0, ',', '.') }} đ</span>
                                            </div>
                                            <div class="column td6">
                                                <span></span>
                                            </div>
                                            <div class="column td5">
                                                <span> <a href="{{ URL::to('/delete-cart/' . $cart_item['session_id']) }}"
                                                        class="box-widget-filter"><i
                                                            class="icon-fl-logout"></i>Delete</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div>
                                    <div class="wrap-flex-box style" style="float: right; margin-right: auto;">
                                        <div class="details ">
                                            <div class="widget widget-recent-post mg-bt-43">
                                                <ul>
                                                    <li class="box-recent-post">
                                                        <div class="box-content">
                                                            <h3><a class="th-title">Total: </a><a
                                                                    class="th-title"
                                                                    style="color: #47A432; ">{{ number_format($totalSale, 0, ',', '.') }}
                                                                    đ</a>
                                                            </h3>
                                                        </div>
                                                    </li>
                                                    <li class="box-recent-post">
                                                        <div class="box-content">
                                                            <h3><a class="th-title">Tax: </a><a
                                                                    class="th-title">{{ number_format($totalSale, 0, ',', '.') }}
                                                                    đ</a>
                                                            </h3>
                                                        </div>
                                                    </li>
                                                    <li class="box-recent-post" style="float: right;">
                                                        <div class="box-content">
                                                            <h3><a class="th-title">Delivery: </a><a
                                                                    class="th-title">{{ number_format($totalSale, 0, ',', '.') }}
                                                                    đ</a>
                                                            </h3>
                                                        </div>
                                                    </li>
                                                    <li class="box-recent-post">
                                                        <div class="box-content">
                                                            <h3><a class="th-title">Sale: </a><a
                                                                    class="th-title"
                                                                    style="color: #DF4949;">{{ number_format($totalSale, 0, ',', '.') }}
                                                                    đ</a>
                                                            </h3>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>


                    <div class="col-md-12 wrap-inner load-more text-center mg-t16">
                        <a href="{{URL::to('/delete-all-cart')}}" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Delete all products</span></a>
                        <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Payment</span></a>
                        <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Payment</span></a>
                    </div>
                    @endforeach
                @else
                    {{-- empty cart, pls input your product --}}
                    <h2 class="text-rainbow">Please add product to cart</h2>
                    @endif

                </div>
            </div>

    </section>
@endsection
