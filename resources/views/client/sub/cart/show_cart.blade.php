@extends('client.main.welcome')
@section('content')
    @php

    use Illuminate\Support\Facades\Session;
    use App\Models\Product;

    $message = Session::get('message');

    $totalSale = 0;
    $percentSale = 0;
    $salePrice = 0;
    $total = 0;
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
                        @php
                            if ($message) {
                                echo '<h3 class="text-rainbow">' . $message . '</h3>';
                                Session::put('message', null);
                                // If message not empty -> make empty
                            }
                        @endphp
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
                                <h3>Sale Price</h3>
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
                                        $salePrice = $cart_item['product_sale_price'] * $cart_item['product_quantity'];
                                        $total += $salePrice;
                                    } else {

                                        $ItemTotal = $cart_item['product_price'] * $cart_item['product_quantity'];
                                        $total += $ItemTotal;
                                    }
                                    $totalSale += $salePrice;

                                @endphp
                                <form action="{{ URL::to('/update-cart') }}" method="POST">
                                    @csrf
                                    <div class="fl-blog fl-item2">
                                        <div class="item flex">

                                            <div class="infor-item flex column1">
                                                <input type="checkbox" name="checkbox" id="checkbox">
                                                <div class="media">
                                                    <img src="{{$cart_item['product_image']}}"
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
                                                            <p>Owned By: {{$cart_item['product_author']}}</p>
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
                                                    VND</span>
                                            </div>
                                            <div class="column td3">

                                                <input style="margin-left: 5rem;" type="number" min="1"
                                                    class="cart_quantity" id="cart_quantity"
                                                    name="cart_quantity[{{ $cart_item['session_id'] }}]"
                                                    value="{{ $cart_item['product_quantity'] }}">

                                            </div>

                                            <div class="column"></div>
                                            <div class="column td3 ">
                                                <span>{{ number_format($salePrice, 0, ',', '.') }} VND</span>
                                            </div>
                                            <div class="column td6">
                                                <span></span>
                                            </div>
                                            <div class="column td5">
                                                <span> <a
                                                        href="{{ URL::to('/delete-cart/' . $cart_item['session_id']) }}"
                                                        class="box-widget-filter"><i
                                                            class="icon-fl-logout"></i>Delete</a></span>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            <div>

                                <div class="wrap-flex-box style" style="float: right; margin-right: auto;">
                                    <div class="details ">
                                        <div class="widget widget-recent-post mg-bt-43">

                                            <ul>
                                                <li class="box-recent-post">
                                                    <div class="box-content">
                                                        <h3><a class="th-title">Sale: </a><a class="th-title"
                                                                style="color: #DF4949;">{{ number_format($totalSale, 0, ',', '.') }}
                                                                VND</a>
                                                        </h3>
                                                    </div>
                                                </li>
                                                <li class="box-recent-post">
                                                    <div class="box-content">
                                                        <h3><a class="th-title">Tax: </a><a class="th-title">
                                                                {{-- {{ number_format($totalSale, 0, ',', '.') }} --}}
                                                                0 VND</a>
                                                        </h3>
                                                    </div>
                                                </li>
                                                <li class="box-recent-post" style="float: right;">
                                                    <div class="box-content">
                                                        <h3><a class="th-title">Delivery: </a><a
                                                                class="th-title">
                                                                {{-- {{ number_format($totalSale, 0, ',', '.') }} --}}
                                                                0 VND</a>
                                                        </h3>
                                                    </div>
                                                </li>
                                                <li class="box-recent-post">
                                                    <div class="box-content">
                                                        <h3><a class="th-title">Total: </a><a class="th-title"
                                                                name="total_price" id="total_price"
                                                                style="color: #47A432; ">{{ number_format($total, 0, ',', '.') }}
                                                                VND</a>
                                                        </h3>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @php
                        $web;
                        if (Session::get('user_name') == null) {
                            $web = 'href=/login';
                        } else {
                            $web = 'href=/checkout';
                        }

                        Session::put('total_price', $total);
                    @endphp

                    <div class="col-md-12 wrap-inner load-more text-center mg-t16">
                        <button type="submit" class="sc-button fl-button pri-3"><span>Update</span></button>
                        <a href="{{ URL::to('/delete-all-cart') }}" class="sc-button fl-button pri-3"><span>Delete all
                                products</span></a>
                        <a {{ $web }} class="sc-button fl-button pri-3"><span>Buy</span></a>
                    </div>
                    </form>
                @else
                    {{-- empty cart, pls input your product --}}
                    <h2 class="text-rainbow">Please add product to cart</h2>
                    @endif

                </div>
            </div>

    </section>


@endsection
