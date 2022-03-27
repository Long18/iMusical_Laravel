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
                    <h1 class="heading text-center">Blog Details
                    </h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="{{ URL::to('/')}}">Home</a></li>
                        <li><a href="#">Community</a></li>
                        <li>Blog Details
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tf-section post-details">
    <div class="themesflat-container">
        <div class="wrap-flex-box style">
            <div class="post">
                <div class="inner-content">
                    <h2 class="title-post">I Believe everyone can be a designer as long they love to create design</h2>
                    <div class="divider"></div>
                    <div class="meta-post flex mg-bt-31">
                        <div class="box">
                            <div class="inner">
                                <h6 class="desc">DESIGNER INTERVIEW</h6>
                                <p>AUGUST CHAPTER</p>
                            </div>
                        </div>
                        <div class="box left">
                            <div class="inner boder pad-r-50">
                                <h6 class="desc">WRITER</h6>
                                <p>DWINAWAN</p>
                            </div>
                            <div class="inner mg-l-39 mg-r-1">
                                <h6 class="desc">DATE</h6>
                                <p>AUGUST 11, 2021</p>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="assets/images/blog/thumb-7.jpg" alt="Image">
                    </div>
                    <div class="inner-post mg-t-40">
                        <h3 class="heading mg-bt-16">What is the most fun thing to become a designer?</h3>
                        <p class="mg-bt-24">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Cupidatat non Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <div class="image-box">
                            <img src="assets/images/blog/thumb1_details.jpg" alt="Image">
                            <img src="assets/images/blog/thumb2_details.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="inner-post mg-t-22">
                        <h3 class="heading mg-bt-16">How is your daily routine?</h3>
                        <p class="mg-bt-24">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Cupidatat non Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum

                        </p>
                        <div class="image">
                            <img src="assets/images/blog/thumb-6.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="inner-post mg-t-24">
                        <h3 class="heading mg-bt-16">Middle Post Heading</h3>
                        <p>Middle Post Heading</p>
                        <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </p>
                        <p class="mg-bt-22">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                            sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    </div>
                    <div class="sc-widget style-1">
                        <div class="widget widget-tag style-2">
                            <h4 class="title-widget">Tags</h4>
                            <ul>
                                <li><a href="#">Bitcoin</a></li>
                                <li><a href="#">Token</a></li>
                                <li><a href="#">Wallet</a></li>
                            </ul>
                        </div>
                        <div class="widget widget-social style-2">
                            <h4 class="title-widget">Share:</h4>
                            <ul>
                                <li><a href="#" class="icon-fl-facebook"></a></li>
                                <li class="style-2"><a href="#" class="icon-fl-coolicon"></a></li>
                                <li class="mgr-none"><a href="#" class="icon-fl-mess"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="divider d2"></div>
                    <div id="comments">
                        <h3 class="heading mg-bt-23">
                            Leave A Comment
                        </h3>
                        <form action="https://demothemesflat.com/axies/contact/contact-process.php" method="post" id="commentform" class="comment-form" >
                            <fieldset class="name">
                                <input type="text" id="name" placeholder="Name" class="tb-my-input" name="name" tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="email">
                                <input type="email" id="email" placeholder="Email *" class="tb-my-input" name="email" tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="message">
                                <textarea id="message" name="message" rows="4" placeholder="Message" tabindex="4" aria-required="true" required=""></textarea>
                            </fieldset>
                            <div class="btn-submit mg-t-36">
                                <button class="tf-button-submit" type="submit">
                                    Send comment
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="side-bar details">
                <div class="widget widget-recent-post mg-bt-43">
                    <h3 class="title-widget mg-bt-23">Recent Post</h3>
                    <ul>
                        <li class="box-recent-post">
                            <div class="box-feature"><a href="blog-details.html"><img src="assets/images/box-item/icon1-recont-post.jpg" alt="image"></a></div>
                            <div class="box-content">
                                <a href="blog-details.html" class="title-recent-post">6 Make Mobile Website Faster</a>
                                <span><span class="sub-recent-post">Lorem ipsum dolor sit amer....</span><a href="blog.html" class="day-recent-post">August 10, 2021</a></span>
                            </div>
                        </li>
                        <li class="box-recent-post">
                            <div class="box-feature"><a href="blog-details.html"><img src="assets/images/box-item/icon2-recont-post.jpg" alt="image"></a></div>
                            <div class="box-content">
                                <a href="blog-details.html" class="title-recent-post">Experts Web Design Tips</a>
                                <span><span class="sub-recent-post">Lorem ipsum dolor sit amer....</span><a href="blog.html" class="day-recent-post">August 22, 2021</a></span>
                            </div>
                        </li>
                        <li class="box-recent-post">
                            <div class="box-feature"><a href="blog-details.html"><img src="assets/images/box-item/icon3-recont-post.jpg" alt="image"></a></div>
                            <div class="box-content">
                                <a href="blog-details.html" class="title-recent-post">Importance Of Web Design</a>
                                <span><span class="sub-recent-post">Lorem ipsum dolor sit amer....</span><a href="blog.html" class="day-recent-post">August 20, 2021</a></span>
                            </div>
                        </li>
                        <li class="box-recent-post">
                            <div class="box-feature"><a href="blog-details.html"><img src="assets/images/box-item/icon4-recont-post.jpg" alt="image"></a></div>
                            <div class="box-content">
                                <a href="blog-details.html" class="title-recent-post">Avoid These Erros In UI Design</a>
                                <span><span class="sub-recent-post">Lorem ipsum dolor sit amer....</span><a href="blog.html" class="day-recent-post">August 12, 2021</a></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="widget widget-tag style-1">
                    <h3 class="title-widget mg-bt-23">Popular Tag</h3>
                    <ul>
                        <li><a href="blog.html" class="box-widget-tag">Bitcoin</a></li>
                        <li><a href="blog.html" class="box-widget-tag">NFT</a></li>
                        <li><a href="blog.html" class="box-widget-tag">Bids</a></li>
                        <li><a href="blog.html" class="box-widget-tag">Digital</a></li>
                        <li><a href="blog.html" class="box-widget-tag">Arts</a></li>
                        <li><a href="blog.html" class="box-widget-tag">Marketplace</a></li>
                        <li><a href="blog.html" class="box-widget-tag">Token</a></li>
                        <li><a href="blog.html" class="box-widget-tag">Wallet</a></li>
                        <li><a href="blog.html" class="box-widget-tag">Crypto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
