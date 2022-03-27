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
                    <h1 class="heading text-center">Blog</h1>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ URL::to('/')}}">Home</a></li>
                        <li><a href="#">Community</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tf-section sc-card-blog dark-style2">
    <div class="themesflat-container">
        <div class="row">
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-1.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-2.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumg-3-1.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-3.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">Tyler Covington</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-4.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-6.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">Freddie Carpenter</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-2.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-4.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-5.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-8.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">Tyler Covington</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-6-1.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-6.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">Freddie Carpenter</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-1.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-2.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-4.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-6.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">Freddie Carpenter</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="fl-blog fl-item2 col-lg-4 col-md-6">
                <article class="sc-card-article">
                    <div class="card-media">
                        <a href="blog-details.html"><img src="assets/images/blog/thumb-5.jpg" alt=""></a>
                    </div>
                    <div class="meta-info">
                        <div class="author">
                            <div class="avatar">
                                <img src="assets/images/avatar/avt-8.jpg" alt="">
                            </div>
                            <div class="info">
                                <span>Post owner</span>
                                <h6> <a href="author02.html">Tyler Covington</a> </h6>
                            </div>
                        </div>
                        <div class="date">Feb 19, 2021</div>
                    </div>
                    <div class="text-article">
                        <h3><a href="blog-details.html">The next big trend in crypto</a></h3>
                        <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut
                            enim reprehenderit cupidatat labore ad laborum consectetur
                            consequat...</p>
                    </div>
                    <a href="blog-details.html" class="sc-button fl-button pri-3"><span>Read More</span></a>
                </article>
            </div>
            <div class="col-md-12 wrap-inner load-more text-center mg-t-10">
                <a href="blog.html" id="loadmore" class="sc-button loadmore fl-button pri-3"><span>Load More</span></a>
            </div>
        </div>
    </div>
</div>

@endsection
