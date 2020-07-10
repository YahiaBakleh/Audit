<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Partner HTML Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300%7CSource+Sans+Pro:400,300,600,400italic' rel='stylesheet' type='text/css'>
        <link href="/new/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/new/css/et-line.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/new/css/socicon.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/new/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/new/css/flexslider.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/new/css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href=/new/"css/custom.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body class="gradient--active">
        <div class="nav-container">
            <nav>
                <div class="nav-bar nav--absolute nav--transparent bg--dark"  data-fixed-at="400">
                    <div class="col-md-2 text-center-xs">
                        <div class="nav-module logo-module">
                            <a href="index.html">
                                <img class="logo" alt="logo" src="/new/img/logo.png" />
                            </a>
                        </div>
                    </div>
                    <!--end cols-->

                    <div class="nav-module menu-module col-md-8 col-xs-12 text-center text-left-xs">
                        <ul class="menu">
                            <li class="" >
                                <a href="#">
                                    @lang('nav.home')
                                </a>

                            </li>
                            <li class="">
                                <a href="#">
                                    @lang('nav.about')
                                </a>

                            </li>
                            <li class="has-dropdown">
                                <a href="#">
                                    Case Studies
                                </a>
                                <ul>
                                    <li>
                                        <a href="case-study-listing.html">
                                            Case Study Listing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="case-study-single.html">
                                            Case Study Single
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">
                                    @lang('nav.vacancy')
                                </a>
                                <ul>
                                    @foreach($careers as $career)
                                    <li>
                                        <a href="{{route('career.show',['section' =>$career])}}">
                                            {{strip_tags($career ->title)}}
                                        </a>
                                    </li>
                                        @endforeach

                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">
                                    News
                                </a>
                                <ul>
                                    <li>
                                        <a href="news-listing.html">
                                            Article Listing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="news-article.html">
                                            Article Single
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="#">
                                    @lang('nav.contact')
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!--end nav module-->

                    <!--end cols-->
                    <div class="col-md-2 text-right text-center-xs clearfix">
                        <div class="nav-module">
                            <a class="btn btn--sm btn--white btn--unfilled" href="#">
                                <span class="btn__text">
                                    @lang('nav.login')
                                </span>
                                <i class="ion-bag"></i>
                            </a>
                        </div>
                    </div>
                    <!--end cols-->
                </div>
                <!--end nav bar-->
                <div class="nav-mobile-toggle visible-sm visible-xs">
                    <i class="ion-drag"></i>
                </div>
                <!--end of toggle-->
            </nav>
        </div>
        <div class="main-container">

            <section class="section-hero-2 slider height-80" data-animation="slide" data-arrows="true">
                <ul class="slides">
                    <li class="imagebg">
                        <div class="background-image-holder">
                            <img alt="image" src="/new/img/home12.jpg" />
                        </div>
                        <div class="container pos-vertical-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-1 col-sm-7">
                                    <h2>Quality is the best business plan
                                     </h2>

                                    <a class="btn btn--white btn--unfilled" href="#">
                                        <span class="btn__text">Purchase Partner Now</span>
                                        <i class="ion-arrow-right-c"></i>
                                    </a>
                                    <a href="#" class="btn btn--white btn--transparent">
                                        <span class="btn__text">
                                            View Our Services
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="imagebg" data-overlay="3">
                        <div class="background-image-holder">
                            <img alt="image" src="/new/img/home5.jpg" />
                        </div>
                        <div class="container pos-vertical-center">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-1 col-sm-7">
                                    <h2>Our success is directly linked to the success of our
                                        clients
                                        </h2>

                                    <a class="btn btn--white btn--unfilled" href="#">
                                        <span class="btn__text">Purchase Partner Now</span>
                                        <i class="ion-arrow-right-c"></i>
                                    </a>
                                    <a href="#" class="btn btn--white btn--transparent">
                                        <span class="btn__text">
                                            View Our Services
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="section-snippet-services">
                <div class="container">
                    <div class="row">
                        <div class="icon-title">
                            <span class="h6">Your Guide</span>
                            <i class="icon-compass icon"></i>
                            <span class="h6">In Business</span>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <p class="lead">
                               <h2>What we Offer</h2>
                                <br class="hidden-xs">
                            </p>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        @foreach($services as $service)
                        <div class="col-sm-6">
                            <div class="hover-element service-element hover--active">
                                <div class="hover-element__initial">
                                    <h3>{!! $service->title !!}
                                        <br> </h3>
                                    <p>

                                        <br class="hidden-xs hidden-sm"> {!! $service->description  !!}
                                    </p>
                                    <a class="link-underline" href="service-single.html">Tell Me More</a>
                                </div>
                                <div class="hover-element__reveal" data-overlay="7">
                                    <div class="background-image-holder" style="background: url(&quot;img/service1.jpg&quot;); opacity: 1;">
                                        <img alt="image" src="/new/img/service1.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach

                    </div>

                    <!--end of row-->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="#" class="btn">
                                <span class="btn__text">
                                    View All Our Services
                                </span>
                                <i class="ion-arrow-right-c"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="imageblock imageblock--lg section-snippet-services-2 bg--secondary">
                <div class="imageblock__content col-md-5 col-sm-4 pos-right hidden-xs">
                    <div class="background-image-holder">
                        <img alt="image" src="/new/img/home9.jpg" />
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-sm-push-1">
                            <div class="section-title">
                                <h6>
                                    Diverse Financial Expertise
                                </h6>
                                <hr>
                            </div>
                            <div class="slider" data-paging="true" data-animation="slide">
                                <ul class="slides">
                                    <li>
                                        <i class="icon icon-compass"></i>
                                        <h2>
                                            Tax Management
                                            <br class="hidden-xs" /> and Advice
                                        </h2>
                                        <p>
                                            Our team of finance experts work tirelessly with businesses owners to better manage their administrational workflow. Hailing from a wide variety of fiscal backgrounds &mdash; we have the right advice for any business.
                                        </p>
                                        <a href="#" class="link-underline">Tell Me More</a>
                                    </li>
                                    <li>
                                        <i class="icon icon-strategy"></i>
                                        <h2>
                                            Business Growth
                                            <br class="hidden-xs" /> and Strategy
                                        </h2>
                                        <p>
                                            Growing a business and forming a sound business strategy requires considered planning and forethought. Partner teams you up with a business finance expert to build the tailored solution your business requires.
                                        </p>
                                        <a href="#" class="link-underline">Tell Me More</a>
                                    </li>
                                    <li>
                                        <i class="icon icon-linegraph"></i>
                                        <h2>
                                            Investment
                                            <br class="hidden-xs" /> and Superannuation
                                        </h2>
                                        <p>
                                            Identifying and managing Superannuation effectively is a common difficulty for many business owners &mdash; Partner's investment experts assist you to find a sensible investment plan for you and your staff.
                                        </p>
                                        <a href="#" class="link-underline">Tell Me More</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="imageblock imageblock--lg section-snippet-benefits-3">
                <div class="imageblock__content col-md-5 col-sm-4 pos-left hidden-xs">
                    <div class="background-image-holder">
                        <img alt="image" src="/new/img/home10.jpg" />
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-6 col-md-5 col-md-push-7">
                            <div class="section-title">
                                <h6>
                                    Empowering Through Technology
                                </h6>
                                <hr>
                            </div>
                            <h2>The right tools
                                <br class="hidden-xs hidden-sm" /> for modern business</h2>
                            <ul class="accordion accordion--oneopen">
                                <li class="active">
                                    <div class="accordion__title">
                                        <span class="h6">ATO Integration</span>
                                    </div>
                                    <div class="accordion__content">
                                        <p>
                                            Our cloud accounting setup prepares your information and reporting in a format that can be directly submitted to the ATO. This takes the guess-work out of correctly preparing tax documents and Business Activity Statements.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="accordion__title">
                                        <span class="h6">Always Online Support</span>
                                    </div>
                                    <div class="accordion__content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="accordion__title">
                                        <span class="h6">Cloud Accounting</span>
                                    </div>
                                    <div class="accordion__content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <!--end accordion-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="cta-video imagebg space--lg" data-overlay="4">
                <div class="background-image-holder">
                    <img alt="image" src="/new/img/home8.jpg" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <div class="modal-instance">
                                <div class="video-play-icon modal-trigger"></div>
                                <div class="modal-container">
                                    <div class="modal-content bg--dark" data-width="70%" data-height="70%">
                                        <iframe src="https://www.youtube.com/embed/dmgomCutGqc?autoplay=1"></iframe>
                                    </div>
                                    <!--end of modal-content-->
                                </div>
                                <!--end of modal-container-->
                            </div>
                            <!--end of modal instance-->
                            <h2>
                                How can Partner help your business?
                            </h2>
                            <p>
                                Partner has worked with over 350 businesses in Melbourne to improve their
                                <br class="hidden-xs" /> financial workflow and achieve results.
                            </p>
                            <a class="btn btn--white btn--unfilled" href="#">
                                <span class="btn__text">View More Case Studies</span>
                                <i class="ion-arrow-right-c"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->

            </section>
            <section class="cta-text-basic bg--dark">

                <!--end of container-->
            </section>
            <div class="notification pos-right pos-bottom col-sm-7 col-md-3" data-animation="from-right" data-autoshow="1000" data-cookie="partner_index_cookies_demo_2_dismissed">
                <div class="boxed boxed--sm bg--white">
                    <p>
                        Hey there, this is a cookies enabled notification. Close it once and it's closed forever.
                    </p>
                    <a class="btn btn--sm notification-close" target="_blank" href="http://www.wikiwand.com/en/HTTP_cookie">
                        <span class="btn__text">
                            Read About Cookies
                            Read About Cookies
                        </span>
                    </a>
                    <a class="btn btn--sm btn--transparent notification-close" href="#">
                        <span class="btn__text">
                            Dismiss
                        </span>
                    </a>
                </div>
            </div>
            <!--end of notification-->

            <footer class="bg--dark">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="logo" alt="Logo" src="/new/img/logo-small.png" />
                            <div class="inline-block">
                                <span class="block">(03) 9823 5527</span>
                                <a href="#" class="link-underline">hello@partnerfinancial.net</a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <p>
                                <strong>Partner Financial</strong>
                                <br /> 1420 Seargants Road
                                <br /> North Carlton
                                <br /> Victoria 3433
                            </p>
                        </div>

                        <div class="col-sm-4">
                            <p>
                                Connect with us :
                            </p>
                            <ul>
                                @if(isset($settings->facebook))
                                <li>
                                    <a href="{{ $settings->facebook }}">
                                        <div class="icon--circle">
                                            <i class="icon socicon socicon-facebook"></i>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                    @if(isset($settings->whatsapp))
                                <li>
                                    <a href="{{$settings->whatsapp}}">
                                        <div class="icon--circle">
                                            <i class="icon socicon socicon-whatsapp"></i>
                                        </div>
                                    </a>
                                </li>
                                    @endif
                                        @if(isset($settings->linkedIn))
                                <li>
                                    <a href="{{$settings->linkedIn}}">
                                        <div class="icon--circle">
                                            <i class="icon socicon socicon-linkedin"></i>
                                        </div>
                                    </a>
                                </li>
                                    @endif
                                            @if(isset($settings->instagram))
                                        <li>
                                            <a href="{{$settings->instagram}}">
                                                <div class="icon--circle">
                                                    <i class="icon socicon socicon-instagram"></i>
                                                </div>
                                            </a>
                                        </li>
                                                @endif
                            </ul>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="footer-auxilary">
                            <div class="col-sm-6">
                                <span>&copy; Copyright 2019 BASSEL SALEH & CO All Rights Reserved</span>
                            </div>
                            <div class="col-sm-6 text-right text-center-xs">
                                <a href="#" class="link-underline">
                                    Terms Of Use
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </footer>
        </div>
        <script src="/new/js/jquery-2.1.4.min.js"></script>
        <script src="/new/js/flexslider.min.js"></script>
        <script src="/new/js/scripts.js"></script>
    </body>

</html>