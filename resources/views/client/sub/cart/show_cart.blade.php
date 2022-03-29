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
    @if ((array) session('cart'))
        @foreach ((array) session('cart') as $cart_item)
            @php

                echo '<pre>';
            print_r($cart_item);
            echo '</pre>';
                $total = 0;
                $subTotal = $cart_item['product_price'] * $cart_item['product_quantity'];
                $total = $subTotal;
            @endphp

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
                                                            href="item-details.html">{{ $cart_item['product_name'] }}</a>
                                                    </h5>
                                                    <div class="author flex">
                                                        <div class="author-avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/author_rank.jpg') }}"
                                                                alt="Images">
                                                            <div class="badge"><i class="ripple"></i></div>
                                                        </div>
                                                        <div class="content">
                                                            <p>Owned By</p>
                                                            <h6><a href="author01.html">SalvadorDali</a></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="column td2">
                                                <span>{{ number_format($cart_item['product_price'], 0, ',', '.') }}đ</span>
                                            </div>
                                            <div class="column td3">
                                                <input style="margin-left: 5rem;" type="number" name="quantity" min="1"
                                                    class="quantity" value="{{ $cart_item['product_quantity'] }}">
                                            </div>
                                            <div class="column"></div>
                                            <div class="column td3 ">
                                                <span>{{ number_format($subTotal, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="column td6">
                                                <span></span>
                                            </div>
                                            <div class="column td5">
                                                <span> <a href="{{ URL::to('/delete-cart' . $cart_item['session_id']) }}"
                                                        class="box-widget-filter"><i
                                                            class="icon-fl-logout"></i>Delete</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12 wrap-inner load-more text-center mg-t16">
                                    <a href="#" id="loadmore"
                                        class="sc-button loadmore fl-button pri-3"><span>Payment</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
        @endforeach
    @endif
@endsection
