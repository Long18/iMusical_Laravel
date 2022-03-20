@extends('welcome')
@section('content')
        
            <!-- title page -->
            <section class="flat-title-page style2">
                <img class="bgr-gradient gradient1" src="{{ asset('public/frontend/images/backgroup-secsion/bg-gradient1.png') }}" alt="">
                <img class="bgr-gradient gradient2" src="{{ asset('public/frontend/images/backgroup-secsion/bg-gradient2.png') }}" alt="">
                <img class="bgr-gradient gradient3" src="{{ asset('public/frontend/images/backgroup-secsion/bg-gradient3.png') }}" alt="">
                <div class="shape item-w-16"></div>
                <div class="shape item-w-22"></div>
                <div class="shape item-w-32"></div>
                <div class="shape item-w-48"></div>
                <div class="shape style2 item-w-51"></div>
                <div class="shape style2 item-w-51 position2"></div>
                <div class="shape item-w-68"></div>
                <div class="overlay"></div>
                <div class="swiper-container mainslider home auctions">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider-item">
                                <div class="themesflat-container ">
                                    <div class="wrap-heading flat-slider flex">
                                        <div class="content">
                                            <h2 class="heading">Discover, find,
                                            </h2>
                                            <h1 class="heading mb-style"><span class="tf-text s1">Sell
                                                    extraordinary</span>
                                            </h1>
                                            <h1 class="heading">Monster NFTs</h1>
                                            <p class="sub-heading mg-t-29 mg-bt-44">Marketplace for monster character
                                                cllections non fungible token NFTs
                                            </p>
                                            <div class="flat-bt-slider flex style2">
                                                <a href="explore-1.html"
                                                    class="sc-button header-slider style style-1 rocket fl-button pri-1"><span>Explore
                                                    </span></a>
                                                <a href="create-item.html"
                                                    class="sc-button header-slider style style-1 note fl-button pri-1"><span>Create
                                                    </span></a>
                                            </div>
                                        </div>
                                        <div class="image">
                                            <img class="img-bg"
                                                src="{{ asset('public/frontend/images/backgroup-secsion/img-bg-sliderhome2.png') }}"
                                                alt="Image">
                                            <img src="{{ asset('public/frontend/images/box-item/imgslider2.png') }}" alt="Image">
                                        </div>
                                    </div>

                                </div>
                            </div><!-- item-->
                        </div>
                        <div class="swiper-slide">
                            <div class="slider-item">
                                <div class="themesflat-container">
                                    <div class="wrap-heading flat-slider text-center two">
                                        <h2 class="heading">Discover, and collect
                                        </h2>
                                        <h1 class="heading"><span class="tf-text s1">extraordinary</span>
                                            <span>Monster NFTs</span>
                                        </h1>
                                        <p class="sub-heading mg-t-29 mg-bt-50">Marketplace for monster character
                                            cllections non fungible token NFTs
                                        </p>
                                        <div class="flat-bt-slider flex">
                                            <a href="explore-1.html"
                                                class="sc-button header-slider style style-1 rocket fl-button pri-1"><span>Explore
                                                </span></a>
                                            <a href="create-item.html"
                                                class="sc-button header-slider style style-1 note fl-button pri-1"><span>Create
                                                </span></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- item-->
                        </div>
                        <div class="swiper-slide">
                            <div class="slider-item">
                                <div class="themesflat-container flex">
                                    <div class="image three">
                                        <img src="{{ asset('public/frontend/images/box-item/imgslider-3.png') }}" alt="Image">
                                        <img class="img-bg"
                                            src="{{ asset('public/frontend/images/backgroup-secsion/img-bg-sliderhome3.png') }}" alt="Image">
                                    </div>
                                    <div class="wrap-heading flat-slider h3 three">
                                        <h2 class="heading">Discover, and collect
                                        </h2>
                                        <h2 class="heading">extraordinary</h2>
                                        <h2 class="heading h3"><span class="fill">Monster </span>NFTs
                                        </h2>
                                        <p class="sub-heading mt-29 mb-35">Marketplace for monster character cllections
                                            non fungible token NFTs
                                        </p>
                                        <div class="flat-bt-slider flex style2">
                                            <a href="explore-1.html"
                                                class="sc-button header-slider style style-1 rocket fl-button pri-1"><span>Explore
                                                </span></a>
                                            <a href="create-item.html"
                                                class="sc-button header-slider style style-1 note fl-button pri-1"><span>Create
                                                </span></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- item-->
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-next btn-slide-next active"></div>
                <div class="swiper-button-prev btn-slide-prev"></div>
            </section>

            <section class="tf-section live-auctions style1 pad-b-54 mobie-style">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-live-auctions">
                                <h2 class="tf-title pb-18">
                                    Live Auctions</h2>
                                <a href="explore-3.html" class="exp style2">EXPLORE MORE</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="swiper-container show-shadow carousel pad-t-17 auctions">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-card-product">
                                                <div class="card-media">
                                                    <a href="item-details.html"><img
                                                            src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}" alt="Image"></a>
                                                    <button class="wishlist-button heart"><span
                                                            class="number-like"> 100</span></button>
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
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-11.jpg') }}" alt="Image">
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
                                                    <button class="wishlist-button heart"><span
                                                            class="number-like"> 220</span></button>
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
                                                            Awakening Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}" alt="Image">
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
                                                    <button class="wishlist-button heart"><span
                                                            class="number-like"> 90</span></button>
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
                                                            01 by Lanza Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-13.jpg') }}" alt="Image">
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
                                                    <button class="wishlist-button heart"><span
                                                            class="number-like"> 145</span></button>
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
                                                            Dress' by Balmain Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-14.jpg') }}" alt="">
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
                                                            src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}" alt="Image"></a>
                                                    <button class="wishlist-button heart"><span
                                                            class="number-like"> 100</span></button>
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
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-11.jpg') }}" alt="Image">
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
                                                    <button class="wishlist-button heart"><span
                                                            class="number-like"> 220</span></button>
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
                                                            Awakening Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}" alt="Image">
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
                                                    <button class="wishlist-button heart"><span
                                                            class="number-like"> 90</span></button>
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
                                                            01 by Lanza Contemplates "</a></h5>
                                                    <div class="tags">bsc</div>
                                                </div>
                                                <div class="meta-info">
                                                    <div class="author">
                                                        <div class="avatar">
                                                            <img src="{{ asset('public/frontend/images/avatar/avt-13.jpg') }}" alt="Image">
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
                                <div class="swiper-pagination mg-t-6"></div>
                                <div class="swiper-button-next btn-slide-next active"></div>
                                <div class="swiper-button-prev btn-slide-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="tf-section live-auctions style2 no-pt-mb tl-pb-0">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-live-auctions">
                                <h2 class="tf-title">
                                    Top Seller</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="swiper-container seller style2 seller-slider2 button-arow-style">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Crispin Berry</a></h5>
                                                    <span class="price">214.2 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-2.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Samson Frost</a></h5>
                                                    <span class="price">205.43 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-4.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor mg-style2">
                                                    <h5><a href="author02.html">Tommy Alvarez</a></h5>
                                                    <span class="price">170.3 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-5.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Windsor Lane</a></h5>
                                                    <span class="price">120.7 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-3.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Andy Hurlbutt</a></h5>
                                                    <span class="price">82.79 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-8.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Blake Banks</a></h5>
                                                    <span class="price">68.2 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-6.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Monica Lucas</a></h5>
                                                    <span class="price">52.8 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-9.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Matt Ramos</a></h5>
                                                    <span class="price">38.4 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-7.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Harper Wilcher</a></h5>
                                                    <span class="price">29.2 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Crispin Berry</a></h5>
                                                    <span class="price">214.2 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-2.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Samson Frost</a></h5>
                                                    <span class="price">205.43 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slider-item">
                                            <div class="sc-author-box style-2">
                                                <div class="author-avatar">
                                                    <img src="{{ asset('public/frontend/images/avatar/avt-4.jpg') }}" alt=""
                                                        class="avatar">
                                                    <div class="badge"></div>
                                                </div>
                                                <div class="author-infor">
                                                    <h5><a href="author02.html">Tommy Alvarez</a></h5>
                                                    <span class="price">170.3 ETH</span>
                                                </div>
                                            </div>
                                        </div><!-- item-->
                                    </div>
                                </div>
                                <div class="swiper-button-next btn-slide-next active"></div>
                                <div class="swiper-button-prev btn-slide-prev "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="tf-section live-auctions style3 pad-b-54 no-pt-mb mobie-pb-70">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-live-auctions mg-bt-21">
                                <h2 class="tf-title pad-l-7">
                                    Today's Picks</h2>
                                <a href="explore-3.html" class="exp style2">EXPLORE MORE</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tf-soft">
                                <div class="soft-left">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="inner">Category</span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter active'>
                                                    <span><img src="{{ asset('public/frontend/images/icon/menu.png') }}" alt="" /> All</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span><img src="{{ asset('public/frontend/images/icon/rainbow.png') }}" alt="" /> Art</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span><img src="{{ asset('public/frontend/images/icon/photo.png') }}" alt="" />
                                                        Photography</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span><img src="{{ asset('public/frontend/images/icon/itunes.png') }}" alt="" />
                                                        Music</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.67188 14.3298C8.67188 15.6198 9.66188 16.6598 10.8919 16.6598H13.4019C14.4719 16.6598 15.3419 15.7498 15.3419 14.6298C15.3419 13.4098 14.8119 12.9798 14.0219 12.6998L9.99187 11.2998C9.20187 11.0198 8.67188 10.5898 8.67188 9.36984C8.67188 8.24984 9.54187 7.33984 10.6119 7.33984H13.1219C14.3519 7.33984 15.3419 8.37984 15.3419 9.66984"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M12 6V18" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span class="inner">Price range</span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter active'>
                                                    <span> Price: Low to High</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span> Price: High to Low</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.0901 12.2799H6.1801V19.4799C6.1801 21.1599 7.0901 21.4999 8.2001 20.2399L15.7701 11.6399C16.7001 10.5899 16.3101 9.7199 14.9001 9.7199H11.8101V2.5199C11.8101 0.839898 10.9001 0.499897 9.7901 1.7599L2.2201 10.3599C1.3001 11.4199 1.6901 12.2799 3.0901 12.2799Z"
                                                    stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="inner">Sale type</span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span> Timed auction</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter active'>
                                                    <span>Fixed price</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span> Not for sale</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span>Open for offers</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.16992 7.44043L11.9999 12.5504L20.7699 7.47043"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M12 21.61V12.54" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M9.92965 2.48028L4.58965 5.44028C3.37965 6.11028 2.38965 7.79028 2.38965 9.17028V14.8203C2.38965 16.2003 3.37965 17.8803 4.58965 18.5503L9.92965 21.5203C11.0696 22.1503 12.9396 22.1503 14.0796 21.5203L19.4196 18.5503C20.6296 17.8803 21.6196 16.2003 21.6196 14.8203V9.17028C21.6196 7.79028 20.6296 6.11028 19.4196 5.44028L14.0796 2.47028C12.9296 1.84028 11.0696 1.84028 9.92965 2.48028Z"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span class="inner">Blockchain</span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter active'>
                                                    <span> Ethereum</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span>Flow</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class='sort-filter'>
                                                    <span>Tezos</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="soft-right">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 7H21" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path d="M6 12H18" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path d="M10 17H14" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                            </svg>
                                            <span>Sort By: Recently Added</span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <h6>Sort by</h6>
                                            <a href="#" class="dropdown-item">
                                                <div class="sort-filer" href="#">
                                                    <span>Recently added</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                <div class="sort-filer active" href="#">
                                                    <span>Price: Low to High</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                <div class="sort-filer" href="#">
                                                    <span>Price: High to Low</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                <div class="sort-filer" href="#">
                                                    <span>Auction ending soon</span>
                                                    <i class="fal fa-check"></i>
                                                </div>
                                            </a>

                                            <h6>Options</h6>
                                            <a href="#" class="dropdown-item">
                                                <div class="sort-filer" href="#">
                                                    <span>Auction ending soon</span>
                                                    <input class="check" type="checkbox" value="checkbox"
                                                        name="check" checked="">
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item">
                                                <div class="sort-filer" href="#">
                                                    <span>Show lazy minted</span>
                                                    <input class="check" type="checkbox" value="checkbox"
                                                        name="check">
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-3.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"The RenaiXance Rising the
                                            sun "</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product coming_soon">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-4.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                    <div class="coming-soon">coming soon</div>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Space babe - Night
                                            2/25”</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-2.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-2.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5><a href="item-details.html">"CyberPrimal 042 LAN”</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-4.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-7.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5><a href="item-details.html">"Crypto Egg Stamp #5”</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-3.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Travel Monkey Club #45”</a>
                                    </h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Ralph Garraway</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-9.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5><a href="item-details.html">"Sir. Lion Swag #371"</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Mason Woodward</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/image-box-11.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Living Vase 01 by
                                            Lanz...</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-3.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Tyler Covington</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Travel Monkey Club #45”</a>
                                    </h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Ralph Garraway</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-3.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"The RenaiXance Rising the
                                            sun "</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product coming_soon">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-4.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                    <div class="coming-soon">coming soon</div>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Space babe - Night
                                            2/25”</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-2.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-2.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5><a href="item-details.html">"CyberPrimal 042 LAN”</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-4.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-7.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5><a href="item-details.html">"Crypto Egg Stamp #5”</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-3.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Travel Monkey Club #45”</a>
                                    </h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Ralph Garraway</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item-9.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5><a href="item-details.html">"Sir. Lion Swag #371"</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Mason Woodward</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/image-box-11.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Living Vase 01 by
                                            Lanz...</a></h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-3.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Tyler Covington</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="fl-item col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="sc-card-product">
                                <div class="card-media">
                                    <a href="item-details.html"><img src="{{ asset('public/frontend/images/box-item/card-item8.jpg') }}"
                                            alt="Image"></a>
                                    <button class="wishlist-button heart"><span class="number-like">
                                            100</span></button>
                                </div>
                                <div class="card-title">
                                    <h5 class="style2"><a href="item-details.html">"Travel Monkey Club #45”</a>
                                    </h5>
                                    <div class="tags">bsc</div>
                                </div>
                                <div class="meta-info">
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="{{ asset('public/frontend/images/avatar/avt-12.jpg') }}" alt="Image">
                                        </div>
                                        <div class="info">
                                            <span>Owned By</span>
                                            <h6> <a href="author02.html">Ralph Garraway</a> </h6>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span>Current Bid</span>
                                        <h5> 4.89 ETH</h5>
                                    </div>
                                </div>
                                <div class="card-bottom">
                                    <a href="#" data-toggle="modal" data-target="#popup_bid"
                                        class="sc-button style bag fl-button pri-3"><span>Place Bid</span></a>
                                    <a href="activity1.html" class="view-history reload">View History</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 wrap-inner load-more text-center mg-t-4">
                            <a href="#" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Load
                                    More</span></a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="tf-section live-auctions style4 no-pt-mb mobie-style">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-live-auctions">
                                <h2 class="tf-title pb-17 text-left">
                                    Popular Collection</h2>
                                <a href="explore-3.html" class="exp style2">EXPLORE MORE</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="collection">
                                <div class="swiper-container show-shadow carousel4 pad-t-20 button-arow-style">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slider-item">
                                                <div class="sc-card-collection style-2 home2">
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <div class="sc-author-box style-2">
                                                                <div class="author-avatar">
                                                                    <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt=""
                                                                        class="avatar">
                                                                    <div class="badge"><i
                                                                            class="ripple"></i></div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <h4><a href="author01.html">Creative Art Collection</a>
                                                                </h4>
                                                                <div class="infor">
                                                                    <span>Created by</span>
                                                                    <span class="name"><a
                                                                            href="author02.html">Ralph
                                                                            Garraway</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="wishlist-button public heart"><span
                                                                class="number-like"> 100</span></button>
                                                    </div>
                                                    <a href="author02.html">
                                                        <div class="media-images-collection">
                                                            <div class="box-left">
                                                                <img src="{{ asset('public/frontend/images/box-item/collection-item-2.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="box-right">
                                                                <div class="top-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/collection-item-top-1.jpg') }}"
                                                                        alt="">
                                                                    <img src="{{ asset('public/frontend/images/box-item/collection-item-top-2.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="bottom-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/collection-item-bottom-4.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!-- item-->
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-item">
                                                <div class="sc-card-collection style-2 home2">
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <div class="sc-author-box style-2">
                                                                <div class="author-avatar">
                                                                    <img src="{{ asset('public/frontend/images/avatar/avt-8.jpg') }}" alt=""
                                                                        class="avatar">
                                                                    <div class="badge"><i
                                                                            class="ripple"></i></div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <h4><a href="author01.html">Colorful Abstract</a></h4>
                                                                <div class="infor">
                                                                    <span>Created by</span>
                                                                    <span class="name"><a
                                                                            href="author02.html">Mason
                                                                            Woodward</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="wishlist-button public heart"><span
                                                                class="number-like"> 100</span></button>
                                                    </div>
                                                    <a href="author01.html">
                                                        <div class="media-images-collection">
                                                            <div class="box-left">
                                                                <img src="{{ asset('public/frontend/images/box-item/img-collection23.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="box-right">
                                                                <div class="top-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection24.jpg') }}"
                                                                        alt="">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection10.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="bottom-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection11.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!-- item-->
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-item">
                                                <div class="sc-card-collection style-2 home2">
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <div class="sc-author-box style-2">
                                                                <div class="author-avatar">
                                                                    <img src="{{ asset('public/frontend/images/avatar/avt-7.jpg') }}" alt=""
                                                                        class="avatar">
                                                                    <div class="badge"><i
                                                                            class="ripple"></i></div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <h4><a href="author01.html">Modern Art Collection</a>
                                                                </h4>
                                                                <div class="infor">
                                                                    <span>Created by</span>
                                                                    <span class="name"><a
                                                                            href="author02.html">Freddie
                                                                            Carpenter</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="wishlist-button public heart"><span
                                                                class="number-like"> 100</span></button>
                                                    </div>
                                                    <a href="author01.html">
                                                        <div class="media-images-collection">
                                                            <div class="box-left">
                                                                <img src="{{ asset('public/frontend/images/box-item/img-collection12.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="box-right">
                                                                <div class="top-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection18.jpg') }}"
                                                                        alt="">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection25.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="bottom-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection17.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!-- item-->
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-item">
                                                <div class="sc-card-collection style-2 home2">
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <div class="sc-author-box style-2">
                                                                <div class="author-avatar">
                                                                    <img src="{{ asset('public/frontend/images/avatar/avt-1.jpg') }}" alt=""
                                                                        class="avatar">
                                                                    <div class="badge"><i
                                                                            class="ripple"></i></div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <h4><a href="author01.html">Creative Art Collection</a>
                                                                </h4>
                                                                <div class="infor">
                                                                    <span>Created by</span>
                                                                    <span class="name"><a
                                                                            href="author02.html">Ralph
                                                                            Garraway</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="wishlist-button public heart"><span
                                                                class="number-like"> 100</span></button>
                                                    </div>
                                                    <a href="author02.html">
                                                        <div class="media-images-collection">
                                                            <div class="box-left">
                                                                <img src="{{ asset('public/frontend/images/box-item/collection-item-2.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="box-right">
                                                                <div class="top-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/collection-item-top-1.jpg') }}"
                                                                        alt="">
                                                                    <img src="{{ asset('public/frontend/images/box-item/collection-item-top-2.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="bottom-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/collection-item-bottom-4.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!-- item-->
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-item">
                                                <div class="sc-card-collection style-2 home2">
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <div class="sc-author-box style-2">
                                                                <div class="author-avatar">
                                                                    <img src="{{ asset('public/frontend/images/avatar/avt-8.jpg') }}" alt=""
                                                                        class="avatar">
                                                                    <div class="badge"><i
                                                                            class="ripple"></i></div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <h4><a href="author01.html">Colorful Abstract</a></h4>
                                                                <div class="infor">
                                                                    <span>Created by</span>
                                                                    <span class="name"><a
                                                                            href="author02.html">Mason
                                                                            Woodward</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="wishlist-button public heart"><span
                                                                class="number-like"> 100</span></button>
                                                    </div>
                                                    <a href="author01.html">
                                                        <div class="media-images-collection">
                                                            <div class="box-left">
                                                                <img src="{{ asset('public/frontend/images/box-item/img-collection23.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="box-right">
                                                                <div class="top-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection24.jpg') }}"
                                                                        alt="">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection10.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="bottom-img">
                                                                    <img src="{{ asset('public/frontend/images/box-item/img-collection11.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!-- item-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="tf-box-icon live-auctions style1 tf-section no-pt-mb">
                <div class="themesflat-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-live-auctions mg-bt-22">
                                <h2 class="tf-title pb-17">
                                    Create And Sell Your NFTs</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="sc-box-icon-inner style2">
                                <div class="sc-box-icon">
                                    <div class="image">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="60" height="60" rx="16" fill="#5142FC" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M36.9227 28.0178H41.104C41.5988 28.0178 42 28.3981 42 28.8671V31.8195C41.9942 32.2862 41.5964 32.6633 41.104 32.6688H37.0187C35.8257 32.684 34.7826 31.9098 34.512 30.8084C34.3765 30.1247 34.5667 29.4192 35.0317 28.8809C35.4966 28.3427 36.1888 28.0268 36.9227 28.0178ZM37.1039 31.1219H37.4986C38.0052 31.1219 38.4159 30.7326 38.4159 30.2524C38.4159 29.7722 38.0052 29.3829 37.4986 29.3829H37.1039C36.8616 29.3802 36.6282 29.4695 36.4559 29.631C36.2835 29.7924 36.1866 30.0126 36.1866 30.2423C36.1865 30.7242 36.5956 31.1164 37.1039 31.1219Z"
                                                fill="#F9F9FA" fill-opacity="0.4" />
                                            <path
                                                d="M36.9227 26.2788H42C42 22.3154 39.5573 20 35.4187 20H24.5813C20.4427 20 18 22.3154 18 26.2282V34.7718C18 38.6846 20.4427 41 24.5813 41H35.4187C39.5573 41 42 38.6846 42 34.7718V34.4078H36.9227C34.5662 34.4078 32.656 32.5971 32.656 30.3635C32.656 28.1299 34.5662 26.3192 36.9227 26.3192V26.2788Z"
                                                fill="white" />
                                            <path
                                                d="M30.4587 26.2788H23.6854C23.177 26.2733 22.768 25.8811 22.7681 25.3992C22.7739 24.9229 23.1829 24.5398 23.6854 24.5398H30.4587C30.9654 24.5398 31.3761 24.9291 31.3761 25.4093C31.3761 25.8895 30.9654 26.2788 30.4587 26.2788Z"
                                                fill="#948BFB" />
                                        </svg>
                                    </div>
                                    <h3 class="heading"><a href="connect-wallet.html">Set Up Your Wallet</a>
                                    </h3>
                                    <p class="content">Wallet that is functional for NFT purchasing. You may
                                        have a Coinbase account at this point, but very few are actually set up to buy
                                        an NFT.</p>
                                </div>
                                <div class="sc-box-icon">
                                    <div class="image">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="60" height="60" rx="16" fill="#47A432" />
                                            <path
                                                d="M25.104 18H21.048C19.368 18 18 19.38 18 21.0732V25.164C18 26.868 19.368 28.2359 21.048 28.2359H25.104C26.796 28.2359 28.1519 26.868 28.1519 25.164V21.0732C28.1519 19.38 26.796 18 25.104 18Z"
                                                fill="white" />
                                            <path
                                                d="M25.104 31.7637H21.048C19.368 31.7637 18 33.1329 18 34.8369V38.9276C18 40.6196 19.368 41.9996 21.048 41.9996H25.104C26.796 41.9996 28.1519 40.6196 28.1519 38.9276V34.8369C28.1519 33.1329 26.796 31.7637 25.104 31.7637Z"
                                                fill="white" />
                                            <path
                                                d="M38.9521 18H34.8961C33.2041 18 31.8481 19.38 31.8481 21.0732V25.164C31.8481 26.868 33.2041 28.2359 34.8961 28.2359H38.9521C40.6321 28.2359 42.0001 26.868 42.0001 25.164V21.0732C42.0001 19.38 40.6321 18 38.9521 18Z"
                                                fill="white" fill-opacity="0.4" />
                                            <path
                                                d="M38.9521 31.7637H34.8961C33.2041 31.7637 31.8481 33.1329 31.8481 34.8369V38.9276C31.8481 40.6196 33.2041 41.9996 34.8961 41.9996H38.9521C40.6321 41.9996 42.0001 40.6196 42.0001 38.9276V34.8369C42.0001 33.1329 40.6321 31.7637 38.9521 31.7637Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <h3 class="heading"><a href="connect-wallet.html">Create Your Collection</a>
                                    </h3>
                                    <p class="content">Setting up your NFT collection and creating NFTs on NFTs
                                        is easy! This guide explains how to set up your first collection</p>
                                </div>
                                <div class="sc-box-icon">
                                    <div class="image">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="60" height="60" rx="16" fill="#9835FB" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.396 25.8881C21.396 23.1621 23.061 21.3951 25.638 21.3951H34.354C36.94 21.3951 38.605 23.1621 38.605 25.8881V31.1901C38.159 30.8121 36.812 29.8711 36.624 29.7591C35.224 28.9191 33.544 29.2991 32.454 30.7191C32.359 30.8441 30.782 33.1441 30.224 33.4881C30.095 33.5681 29.959 33.6111 29.814 33.6311C29.464 33.6611 29.127 33.4811 28.554 33.0981C28.224 32.8881 27.864 32.6491 27.454 32.4791C25.749 31.7661 24.45 32.9441 23.758 33.7341C23.749 33.7421 21.812 36.1041 21.781 36.1411C21.538 35.5501 21.396 34.8671 21.396 34.1021V25.8881ZM40 25.888C40 22.362 37.731 20 34.354 20H25.638C22.271 20 20 22.362 20 25.888V34.102C20 35.674 20.447 37.013 21.238 38.009C21.247 38.018 21.247 38.028 21.256 38.028C22.043 39.013 23.166 39.666 24.519 39.899C24.531 39.901 24.543 39.903 24.556 39.905C24.903 39.962 25.262 40 25.638 40H34.354C34.535 40 34.7 39.966 34.874 39.953C35.078 39.936 35.289 39.932 35.483 39.898C35.74 39.854 35.976 39.777 36.215 39.703C36.319 39.67 36.43 39.65 36.53 39.612C36.773 39.52 36.996 39.401 37.217 39.279C37.297 39.235 37.383 39.199 37.461 39.15C37.678 39.014 37.875 38.855 38.068 38.689C38.132 38.634 38.201 38.584 38.262 38.526C38.45 38.347 38.616 38.15 38.775 37.944C38.824 37.879 38.876 37.819 38.923 37.752C39.076 37.534 39.208 37.299 39.33 37.054C39.364 36.983 39.4 36.914 39.433 36.842C39.546 36.585 39.64 36.316 39.72 36.034C39.741 35.958 39.762 35.883 39.78 35.805C39.851 35.514 39.902 35.214 39.935 34.9C39.939 34.862 39.95 34.827 39.954 34.789C39.961 34.704 39.96 34.619 39.965 34.534C39.973 34.388 40 34.253 40 34.102V25.888Z"
                                                fill="white" />
                                            <path
                                                d="M26.5053 28.9995C27.8668 28.9995 29.0005 27.8694 29.0005 26.5145C29.0005 25.8351 28.7156 25.2126 28.2611 24.7609C27.8086 24.2929 27.1768 23.9995 26.4792 23.9995C25.109 23.9995 24.0005 25.1035 24.0005 26.4681C24.0005 26.6486 24.0218 26.8233 24.0596 26.9931C24.2883 28.1252 25.3086 28.9995 26.5053 28.9995Z"
                                                fill="white" fill-opacity="0.4" />
                                        </svg>
                                    </div>
                                    <h3 class="heading"><a href="connect-wallet.html">Add Your NFTs</a></h3>
                                    <p class="content">Sed ut perspiciatis un de omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium, totam rem.</p>
                                </div>
                                <div class="sc-box-icon">
                                    <div class="image">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="60" height="60" rx="16" fill="#DF4949" />
                                            <rect x="23" y="24" width="13" height="4" fill="white" fill-opacity="0.4" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M26.125 18H33.8375C37.225 18 39.9625 19.284 40 22.5478V40.7631C40 40.9671 39.95 41.1711 39.85 41.3511C39.6875 41.6391 39.4125 41.8551 39.075 41.9511C38.75 42.0471 38.3875 41.9991 38.0875 41.8311L29.9875 37.9432L21.875 41.8311C21.6888 41.9259 21.475 41.9871 21.2625 41.9871C20.5625 41.9871 20 41.4351 20 40.7631V22.5478C20 19.284 22.75 18 26.125 18ZM25.2753 27.1437H34.6878C35.2253 27.1437 35.6628 26.7225 35.6628 26.1958C35.6628 25.6678 35.2253 25.2478 34.6878 25.2478H25.2753C24.7378 25.2478 24.3003 25.6678 24.3003 26.1958C24.3003 26.7225 24.7378 27.1437 25.2753 27.1437Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <h3 class="heading"><a href="connect-wallet.html">List Them For Sale</a>
                                    </h3>
                                    <p class="content">Choose between auctions, fixed-price listings, and
                                        declining-price listings. You choose how you want to sell your NFTs!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


@endsection