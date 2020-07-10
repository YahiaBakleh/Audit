<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-79547588-11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-79547588-11');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASSEL SALEH & CO</title>
    <meta name="description"
          content="BASSEL SALEH & CO"/>
    <meta name="keywords"
          content="Auditing & Accounting ">


    <!-- Theme color css -->
    <link href="/main/minify/ckav_min.css" rel="stylesheet">
    <link href="/main/css/themes/theme-01.css" rel="stylesheet">
    <link href="/main/css/template-custom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <style>
        .dr {
            color: white;
            font-size: 16px;
            font-weight: normal;
        }

        /* Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: dimgray;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;


        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: white;
            text-decoration: none;
            display: block;
            font-family: 'Open Sans', sans-serif;
            font-weight:normal;
            padding: 0px;
        }

        /* Change color of dropdown links on hover */


        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {display: block;}

        /* Change the background color of the dropdown button when the dropdown content is shown */

        .owl-carousel {
            position: relative;
        .transition(.10s ease-in-out left);
        }
    </style>


    <!-- Favicons -->
    @if(isset($settings->favicon))
        <link rel="shortcut icon" type="image/png" href="{{ asset('storage/' . $settings->favicon) }}"/>
@endif

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="/main/js/html5shiv.js"></script>
    <script src="/main/js/respond.min.js"></script>
    <![endif]-->
    <!--[if IE 9 ]>
    <script src="/main/js/ie-matchmedia.js"></script><![endif]-->
</head>

<body class="bg-light theme-01">

<!--
************************************************************
* PAGELOADER
*************************************************************
-->
<div id="pageloader">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- ************** END : PAGELOADER **************  -->

<!--
************************************************************
* MAIN WRAPPER
*************************************************************
-->
<div class="mainwrapper min-vh-h100">

    <!--
    ************************************************************
    * HEADER
    *************************************************************
    -->
    <header class="header flex-cc fixed t0 l0 w100" data-ckav-sm="pd-0 block" data-scrollsticky="y"
            style="font-weight: normal">

        <div class="container-fluid" data-ckav-sm="w-reset w100">

            <label style="float: right;  padding-right: 50px;" class="d-none d-lg-block fs18 txt-white  f-2"><a
                        href="{{ route('login') }}"> @lang('nav.login')</a></label>
            <div class="row align-items-center typo-light">

                <div class="col-lg-2 order-lg-1 align-c" data-ckav-md="align-l pd-20" data-ckav-sm="align-l pd-10">
                    <a href="#" class="inline-block px-w80 mr-auto logowrp" data-ckav-md="px-w60" data-ckav-sm="px-w40"><img
                                src="   "></a>

                    <div class="menu-iconwrp" data-ckav-md="block pd-40" data-ckav-sm="block pd-10 pd-tb-tiny">
                        <div class="menu-icon" data-ckav-sm="block">
                            <span></span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 align-r" data-ckav-sm="align-c">
                    <ul class="list-reset nav-ul inline-block fs16 txt-white   f-2" data-ckav-sm="block">
                        <li><a href="#" data-pagelinkto="homepage"
                               class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink active-menulink">@lang('nav.home')</a>
                        </li>
                        <li><a href="#" data-pagelinkto="aboutpage"
                               class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink">@lang('nav.about')</a>
                        </li>
                        <li><a href="#" data-pagelinkto="servicepage"
                               class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink">@lang('nav.services')</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 align-l order-lg-last" data-ckav-sm="align-c" style="overflow: visible">
                    <ul class="list-reset nav-ul inline-block fs18 txt-white  f-2" data-ckav-sm="block">
                        <!--<li><a href="#" data-pagelinkto="bloglistpage"
                               class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink"></a></li>-->
                        <li><a class="d-none d-lg-block mr-lr-20 mr-tb-10 pd-tb-10 block pagelink" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('nav.vacancy')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: black" >
                                <div class="container-fluid" style="color: grey" >

                            @foreach($careers as $career)

                            <a href="{{route('career.show',['section' =>$career])}}" data-pagelinkto="portfoliopage"
                               class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink dr"> {{strip_tags($career ->title)}}</a>
                        @endforeach
                            </div>
                            </div>

                            <li class="d-block d-lg-none">
                                <div class="dropdown">
                                    <button class="dropbtn" style="padding: 0;
border: none;
background: none;">@lang('nav.vacancy')</button>
                                    <div class="dropdown-content" >
                                        @foreach($careers as $career)
                                            <a href="{{route('career.show',['section' =>$career])}}" data-pagelinkto="portfoliopage"
                                               class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink">{{strip_tags($career ->title)}}</a>
                                            @endforeach

                                    </div>
                                </div>
                            </li>
                        <li><a href="#" data-pagelinkto="contactpage" class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink">@lang('nav.contact')</a>
                        </li>
                        <li class="d-block d-lg-none"><a href="{{ route('login') }}" data-pagelinkto="portfoliopage"
                                                         class="mr-lr-20 mr-tb-10 pd-tb-10 block pagelink">@lang('nav.login')</a>
                        </li>


                    </ul>
                </div>
            </div>

        </div>


    </header>
    <!-- ************** END : HEADER **************  -->

    <!--
    ************************************************************
    * HOME PAGE
    *************************************************************
    -->
    <div data-thispage="homepage" class="mainpage ckav-pages homepage flex-cc typo-light activepage">

        <!--=================================
         = BACKGROUND HOLDER
         ==================================-->
        <div class="bg-holder full-wh z1">

            <!-- OVERLAY -->
            <b data-bgholder="overlay" class="full-wh z3" data-rgradient="y"
               data-rg-colors="rgba(255, 33, 79, 0)|rgba(102, 102, 255, 0)"></b>

            <!-- YOUTUBE BACKGROUND -->
            <div class="full-wh nc-bgeffect vide-widget z2" data-vide-src=""></div>

            <!-- BACKGROUND IMAGE -->

            <b data-bgholder="bg-img" class="full-wh bg-cover bg-cc z1" data-bg="/main/images/b.png"></b>

        </div>
        <!-- ======= END : BACKGROUND HOLDER =======  -->

        <!--=================================
        = TEXT AREA
        ==================================-->
        <div class="container align-c">

            <div>

                <div class="carousel-widget ctrl-3 align-c"
                     data-items="1"
                     data-nav="false"
                     data-pager="false"
                     data-itemrange="0,1|420,1|600,1|768,1|992,1|1200,1"
                     data-margin="30"
                     data-autoplay="true"
                     data-hauto="true"
                     data-in="fadeIn"
                     data-out="fadeOut"
                     data-loop="true"
                     data-center="false">
                    <div class="owl-carousel">

                        <div class="item">
                            <h1 class="title f-1 fs50  mr-b-40" data-ckav-md="fs40" data-ckav-sm="fs30"
                                style="font-weight: normal">Quality is the best business plan </h1>
                        </div>
                        <div class="item">
                            <h1 class="title f-1 fs50  mr-b-40" data-ckav-md="fs40" data-ckav-sm="fs30"
                                style="font-weight: normal">We deliver the highest level of experience and
                                expertise </h1>
                        </div>
                        <div class="item">
                            <h1 class="title f-1 fs50  mr-b-40" data-ckav-md="fs40" data-ckav-sm="fs30"
                                style="font-weight: normal">Our success is directly linked to the success of our
                                clients </h1>
                        </div>
                        <div class="item">
                            <h1 class="title f-1 fs50  mr-b-40" data-ckav-md="fs40" data-ckav-sm="fs30"
                                style="font-weight: normal">It’s not just about numbers, <br> it’s about people </h1>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- ======= END : TEXT AREA =======  -->

        <!--=================================
        = SOCIAL ICONS
        ==================================-->
        <div class="social-icons pd-tb-30 fixed b0 l0 w100 z2 align-c">
            <ul class="list-reset social-ul inline-block fs11 txt-white f-2" style="font-weight: normal">
                @if(isset($settings->facebook))
                    <li><a href="{{ $settings->facebook }}" class="pd-20 block" data-ckav-sm="pd-10">Facebook</a></li>
                    <li>|</li>
                @endif
                @if(isset($settings->whatsapp))
                    <li><a href="{{ $settings->whatsapp }}" class="pd-20 block" data-ckav-sm="pd-10">Whatsapp</a></li>
                    <li>|</li>
                @endif

                @if(isset($settings->linkedIn))
                    <li><a href="{{ $settings->linkedIn }}" class="pd-20 block" data-ckav-sm="pd-10">LinkedIn</a></li>
                    <li>|</li>
                @endif

                @if(isset($settings->instagram))
                    <li><a href="{{ $settings->instagram }}" class="pd-20 block" data-ckav-sm="pd-10">Instagram</a></li>
                @endif
            </ul>
        </div>



        <!-- ======= END : SOCIAL ICONS =======  -->

    </div>

    <!--
************************************************************
* Services PAGE
*************************************************************
-->


    <div data-thispage="servicepage" class="otherpage ckav-pages servicepage bg-light typo-light align-c pd-t-40">
        <div class="container-fluid pd-0 mr-t-200" data-ckav-sm="mr-t-60">


            <!--=================================
            = OUR SERVICES
            ==================================-->

            <div class="section-05 pd-tb-100" data-ckav-sm="pd-tb-50">
                <div class="container">


                    <!-- SECTION TITLE -->
                    <div class="section-title mr-b-60" data-ckav-sm="mr-b-30">
                        <span class="txt-upper f-1 fs14 bold-3 mr-b-10 ltr-3 txt-default block"
                              data-ckav-sm="mr-b-0 fs12"
                              style="font-family: 'Open Sans', sans-serif; font-weight: bold">Our Services</span>
                        <h2 class="title f-1 fs46 bold-4" data-ckav-md="fs40" data-ckav-sm="fs30"
                            style="font-family: 'Open Sans', sans-serif;">What we Offer</h2>
                    </div><!-- / SECTION TITLE -->


                    <div class="slider mr-b-30">
                        <div class="carousel-widget ctrl-3 light align-c overflow-none shadow-xlarge"
                             data-items="1"
                             data-nav="true"
                             data-pager="false"
                             data-itemrange="0,1|420,1|600,1|768,1|992,1|1200,1"
                             data-margin="30"
                             data-autoplay="false"
                             data-hauto="false"
                             data-in="false"
                             data-out="false"
                             data-center="false">
                            <div class="owl-carousel">

                                <div class="item">
                                    <img src="/main/images/services.jpg" class="rd-5" alt="image">
                                </div>


                            </div>
                        </div>
                    </div><!-- / SLIDER -->

                    <p class=" f-1 fs20  mr-auto op-07" data-ckav-md="w100 mr-b-30" data-ckav-sm="fs18 w100 mr-b-30">We
                        offer a full range of financial, auditing and accounting services that will give you a clear
                        insight into your company strategy, business processes and financial reports, we give you all
                        the necessary advice and support to manage your operational and financial processes, risks
                        involved, and investment evaluation.</p>
                    <!-- / SECTION TITLE -->

                    <div class="carousel-widget light ctrl-3 align-c zoom-carousel overflow-none -mr-b-100"
                         data-items="1"
                         data-nav="true"
                         data-pager="false"
                         data-itemrange="0,1|420,1|600,2|768,3|992,3|1200,3"
                         data-margin="30"
                         data-autoplay="false"
                         data-loop="true"
                         data-hauto="false"
                         data-in="false"
                         data-out="false"
                         data-center="true">
                        <div class="owl-carousel">

                            @foreach($services as $service)


                                <div class="item">
                                    <div class="content mr-t-40 rd-5">
                                        <div class="info-obj img-t g10 medium align-c shadow-xlarge bg-dark typo-light pd-40 rd-5 bdr-1 bdr-op-1">
                                            <div class="img"></div>
                                            <div class="info">
                                               <a href="{{route('service.show' , ['section' =>$service])}}"> <h3  class="title f-1 fs20 bold-4 mr-b-10"
                                                    data-ckav-sm="fs24"
                                                    style="color:#01795b; ">{!! $service->title !!}</h3></a>
                                                <span class="txt-upper f-1 fs11 bold-3 ltr-3 txt-default block"></span>

                                                <p class="f-2 mr-auto mr-t-30 mr-b-0 op-07">
                                                    {!! $service->description  !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

                <!-- ======= END : OUR SERVICES =======  -->

                <!--=================================
                = FOOTER
                ==================================-->
            <footer class="pd-tb-30 bg-dark typo-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" target="_blank">BASSEL SALEH & CO</a> ©
                            <script>document.write(new Date().getFullYear());</script>
                        </div>
                    </div>

                    <div class="social-links op-06 mr-t-20">
                        @if(isset($settings->facebook))
                            <a href="{{ $settings->facebook }}" target="_blank"
                               class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                        class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(isset($settings->whatsapp))
                            <a href="{{ $settings->whatsapp }}" target="_blank"
                               class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                        class="fab fa-whatsapp"></i></a>
                        @endif
                        @if(isset($settings->instagram))
                            <a href="{{ $settings->instagram }}" target="_blank"
                               class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                        class="fab fa-instagram"></i></a>
                        @endif
                        @if(isset($settings->linkedIn))
                            <a href="{{ $settings->linkedIn }}" target="_blank"
                               class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                        class="fab fa-linkedin"></i></a>
                        @endif

                    </div>
                </div>
            </footer>
                <!-- ======= END : FOOTER =======  -->
        </div>
    </div>


        <!-- ************** END : Services PAGE **************  -->

        <!--
       ************************************************************
       * About PAGE
       *************************************************************
       -->


        <div data-thispage="aboutpage"
             class="otherpage ckav-pages aboutpage bg-light typo-light align-c pd-t-40">
            <div class="container-fluid pd-0 mr-t-200" data-ckav-sm="mr-t-60">

                <!--=================================
                = OUR STORY
                ==================================-->
                <div class="section-01 pd-b-100" data-ckav-sm="pd-b-50">
                    <div class="container">

                        <!-- SECTION TITLE -->
                        <div class="section-title mr-b-60" data-ckav-sm="mr-b-30">
                        <span class="txt-upper f-1 fs14 bold-3 mr-b-10 ltr-3 txt-default block"
                              data-ckav-sm="mr-b-0 fs12"
                              style="font-family: 'Open Sans', sans-serif; font-weight: bold">Our Story</span>
                            <h2 class="title f-1 fs46 bold-4" data-ckav-md="fs40" data-ckav-sm="fs30"
                                style="font-family: 'Open Sans', sans-serif;">Who we are</h2>
                        </div><!-- / SECTION TITLE -->

                        <!-- SLIDER -->
                        <div class="slider mr-b-30">
                            <div class="carousel-widget ctrl-3 light align-c overflow-none shadow-xlarge"
                                 data-items="1"
                                 data-nav="true"
                                 data-pager="false"
                                 data-itemrange="0,1|420,1|600,1|768,1|992,1|1200,1"
                                 data-margin="30"
                                 data-autoplay="false"
                                 data-hauto="false"
                                 data-in="false"
                                 data-out="false"
                                 data-center="false">
                                <div class="owl-carousel">

                                    <div class="item">
                                        <img src="/main/images/about.png" class="rd-5" alt="image">
                                    </div>


                                </div>
                            </div>
                        </div><!-- / SLIDER -->

                        <p class=" f-1 fs20  mr-auto op-07" data-ckav-md="w100 mr-b-30"
                           data-ckav-sm="fs18 w100 mr-b-30">
                            BASSEL SALEH & CO is a firm of Certified Public Accountants and Financial
                            Advisors operating
                            throughout the Syrian Arab Republic. We have one aim: </p></br>
                        <p class=" f-1 fs20  mr-auto op-07" data-ckav-md="w100 mr-b-30"
                           data-ckav-sm="fs18 w100 mr-b-30"
                           style="text-align: center;"><b>"GIVING YOUR BUSINESS A BOOST"</b></p>
                        <p class=" f-1 fs20  mr-auto op-07" data-ckav-md="w100 mr-b-30"
                           data-ckav-sm="fs18 w100 mr-b-30">
                            It is not just about numbers, it is about people. We believe that building
                            strong relationships
                            with our clients is the key to offering an unrivalled service. Only by
                            understanding your aims
                            and objectives, we deliver the highest level of client care. We
                            understand that our
                            success is directly linked to the success of our clients, and are committed to
                            delivering an
                            expert and professional services that drive the performance of our
                            clients.

                        </p>

                    </div>
                </div>
                <!-- ======= END : OUR STORY =======  -->

                <!--=================================
                = OUR VISION & MISSION
                ==================================-->
                <div class="section-02">
                    <div class="container-fluid">

                        <!-- SUB SECTION 1 -->
                        <div class="row align-items-center gt-0">

                            <div class="col-md-6">
                                <!-- SECTION TITLE -->
                                <div class="section-title mr-b-40" data-ckav-sm="mr-b-30">
                                <span class="txt-upper f-1 fs14 bold-3 mr-b-10 ltr-3 txt-default block"
                                      data-ckav-sm="mr-b-0 fs12" style="font-family: 'Open Sans', sans-serif;">Target to achive</span>
                                    <h2 class="title f-1 fs46 bold-4" data-ckav-md="fs40"
                                        data-ckav-sm="fs30"
                                        style="font-family: 'Open Sans', sans-serif;">Our Mission</h2>
                                </div><!-- / SECTION TITLE -->

                                <p class="f-1 fs18 px-w500 mr-auto op-07" data-ckav-sm="fs16 w100 mr-b-30">
                                    Our mission is to act as a trusted advisor, providing objective and
                                    results-oriented
                                    analysis, solutions and implementation to become even more successful.
                                </p>
                            </div>

                            <div class="col-md-6 min-px-h600" data-ckav-sm="h-reset min-px-h300 mr-b-60">
                                <div class="bg-holder full-wh z1">
                                    <!-- OVERLAY -->
                                    <b data-bgholder="overlay" class="full-wh z3" data-rgradient="y"
                                       data-rg-colors="rgba(255, 33, 79, 0.00)|rgba(255, 33, 79, 0)"></b>

                                    <!-- BACKGROUND IMAGE -->
                                    <b data-bgholder="bg-img" class="full-wh bg-cover bg-cc z1 rd-5"
                                       data-bg="/main/images/Mission.png"></b>
                                </div>
                            </div>

                        </div>
                        <!-- / SUB SECTION 1 -->

                        <!-- SUB SECTION 1 -->
                        <div class="row align-items-center gt-0">

                            <div class="col-md-6">
                                <!-- SECTION TITLE -->
                                <div class="section-title mr-b-40" data-ckav-sm="mr-b-30">
                                <span class="txt-upper f-1 fs14 bold-3 mr-b-10 ltr-3 txt-default block"
                                      data-ckav-sm="mr-b-0 fs12" style="font-family: 'Open Sans', sans-serif;">Look Forward</span>
                                    <h2 class="title f-1 fs46 bold-4" data-ckav-md="fs40"
                                        data-ckav-sm="fs30"
                                        style="font-family: 'Open Sans', sans-serif;">Our Vision</h2>
                                </div><!-- / SECTION TITLE -->

                                <p class="f-1 fs18 px-w500 mr-auto txt-white op-07"
                                   data-ckav-sm="fs16 mr-b-30 w100">
                                    Our Vision is to be a preferred “Specialized” Consulting Company and
                                    strategic partner
                                    to our clients by 2025 in Business Transformation, Performance
                                    Improvement, Capability
                                    Development and Continuous Improvement.
                                </p>
                            </div>

                            <div class="col-md-6 min-px-h600 order-md-first"
                                 data-ckav-sm="h-reset min-px-h300">
                                <div class="bg-holder full-wh z1">
                                    <!-- OVERLAY -->
                                    <b data-bgholder="overlay" class="full-wh z3" data-rgradient="y"
                                       data-rg-colors="rgba(255, 33, 79, 0.00)|rgba(255, 33, 79, 0)"></b>

                                    <!-- BACKGROUND IMAGE -->
                                    <b data-bgholder="bg-img" class="full-wh bg-cover bg-ct z1 rd-5"
                                       data-bg="/main/images/Vission.png"></b>
                                </div>
                            </div>

                        </div>
                        <!-- / SUB SECTION 1 -->

                    </div>
                </div>
                <!-- ======= END : OUR VISION & MISSION =======  -->

                <!--=================================
                = FOOTER
                ==================================-->
                <footer class="pd-tb-30 bg-dark typo-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" target="_blank">BASSEL SALEH & CO</a> ©
                                <script>document.write(new Date().getFullYear());</script>
                            </div>
                        </div>

                        <div class="social-links op-06 mr-t-20">
                            @if(isset($settings->facebook))
                                <a href="{{ $settings->facebook }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(isset($settings->whatsapp))
                                <a href="{{ $settings->whatsapp }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-whatsapp"></i></a>
                            @endif
                            @if(isset($settings->instagram))
                                <a href="{{ $settings->instagram }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-instagram"></i></a>
                            @endif
                            @if(isset($settings->linkedIn))
                                <a href="{{ $settings->linkedIn }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-linkedin"></i></a>
                            @endif

                        </div>
                    </div>
                </footer>
                <!-- ======= END : FOOTER =======  -->

            </div>
        </div>

        <!-- ************** END : About PAGE **************  -->

        <!--
         ************************************************************
         * CONTACT PAGE
         *************************************************************
         -->
        <div data-thispage="contactpage"
             class="otherpage ckav-pages contactpage bg-light typo-light align-c pd-t-40">
            <div class="container-fluid pd-0 mr-t-200" data-ckav-sm="mr-t-60">

                <!--=================================
                = GOOGLE MAP AND CONTACT INFO AND FORM
                ==================================-->
                <div class="section-11 pd-b-100">
                    <div class="container">

                        <!-- GOOGLE MAP -->
                        <div class="px-h500 w100" data-ckav-sm="w100 mr-b-30">
                            <iframe class="w100 h100 shadow-xlarge rd-5"
                                    src="https://maps.google.com/maps?q=%D8%B5%D8%A7%D9%84%D8%AD%D9%8A%D8%A9%20%D8%AF%D9%85%D8%B4%D9%82&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    style="border:0" allowfullscreen></iframe>
                        </div><!-- / GOOGLE MAP -->

                        <!-- CONTACT INFO -->
                        <div class="px-w600 pd-40 bg-default typo-light mr-auto relative -mr-t-100 shadow-large mr-b-60"
                             data-ckav-sm="w100 mr-0 mr-b-50">
                            <p class="fs20">
                                {!! $settings->location ?? '' !!}
                            </p>
                            @if(isset($settings->mobile))
                                <p class="fs16">
                                    <strong>Tel:</strong>{{ $settings->mobile }}
                                </p>
                            @endif
                        </div><!-- / CONTACT INFO -->

                        <!-- SECTION TITLE -->
                        <div class="section-title mr-b-60" data-ckav-sm="mr-b-30">
                        <span class="txt-upper f-1 fs14 bold-3 mr-b-10 ltr-3 txt-default block"
                              data-ckav-sm="mr-b-0 fs12"
                              style="font-family: 'Open Sans', sans-serif;">Drop us line</span>
                            <h2 class="title f-1 fs46 bold-4" data-ckav-md="fs40" data-ckav-sm="fs30"
                                style="font-family: 'Open Sans', sans-serif;">Contact Us</h2>
                        </div><!-- / SECTION TITLE -->

                        <!-- CONTACT FORM -->
                        <form action="{{route('message')}}"  class="align-l px-w500 mr-auto align-c"  data-ckav-sm="align-c w100" method="post">
                            {{csrf_field()}}
                            <div class="field-wrp mr-b-40">

                                <div class="row gt10">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-light bb" data-label="Name" required="" data-msg="Please enter name." type="text" name="name" placeholder="Enter your name" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control form-control-light bb" data-label="Email" required="" data-msg="Please enter email." type="email" name="email" placeholder="Enter your email" aria-required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control form-control-light bb" required="" data-label="Phone" data-msg="Please phone number." type="text" name="phone" placeholder="Enter your phone number" aria-required="true">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control form-control-light bb" data-label="Message" required="" data-msg="Please enter your message." name="message" placeholder="Add your message" cols="30" rows="5" aria-required="true"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn solid btn-default txt-upper round mr-auto" onclick="myFunction()"><i class="fa fa-envelope-o"></i> Send Message
                            </button>
                        </form><!-- / CONTACT FORM -->

                    </div>
                </div>
                <!-- ======= END : GOOGLE MAP AND CONTACT INFO =======  -->

                <!--=================================
                = FOOTER
                ==================================-->
                <footer class="pd-tb-30 bg-dark typo-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" target="_blank">BASSEL SALEH & CO</a> ©
                                <script>document.write(new Date().getFullYear());</script>
                            </div>
                        </div>

                        <div class="social-links op-06 mr-t-20">
                            @if(isset($settings->facebook))
                                <a href="{{ $settings->facebook }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(isset($settings->whatsapp))
                                <a href="{{ $settings->whatsapp }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-whatsapp"></i></a>
                            @endif
                            @if(isset($settings->instagram))
                                <a href="{{ $settings->instagram }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-instagram"></i></a>
                            @endif
                            @if(isset($settings->linkedIn))
                                <a href="{{ $settings->linkedIn }}" target="_blank"
                                   class="sq30 fs16 mr-r-4 rd-4 iconbox btn-white"><i
                                            class="fab fa-linkedin"></i></a>
                            @endif

                        </div>
                    </div>
                </footer>
                <!-- ======= END : FOOTER =======  -->

            </div>
        </div>
        <!-- ************** END : CONTACT PAGE **************  -->

    </div>
    <!-- ************** END : HOME PAGE **************  -->


    <!-- GOOGLE FONTS -->
    <script>
        /* Use fonts with class name in sequence => f-1, f-2, f-3 .... */
        var fgroup = [
            'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i',
            'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
            'Satisfy'
        ];
    </script>

    <script src="/main/minify/ckav_min.js"></script>
<script>
    function myFunction()
    {
        swal("Thank you For your feedback!", "Your Message Have Been Sent Successfully!", "success")
    }
</script>

</body>