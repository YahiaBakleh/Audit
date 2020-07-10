@extends('main.layouts.layout')

@section('content')
    @if(count($slides))
        @include('main.slider')
    @endif
    <section class="page-title bg--secondary">
        <div class="container">

            <!--end of row-->
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="row">
                        <div class="icon-title">
                            <span class="h6">@lang('home.left_compass')</span>
                            <i class="icon-compass icon"></i>
                            <span class="h6">@lang('home.right_compass')</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">

                                <p class="lead">

                                @lang('home.under_slider')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section class="slider height-60" data-animation="slide" data-arrows="true" data-timing="5000" style="direction: initial">

        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 800%; transition-duration: 0s; transform: translate3d(-1351px, 0px, 0px);">
                @foreach($ads as $ad)
                <li class="imagebg clone" data-overlay="3" aria-hidden="true" style="width: 1351px; float: left; display: block;">
                    <div class="background-image-holder" style="background: url(&quot;img/home7.jpg&quot;); opacity: 1;">
                        <img alt="image" src="{{ asset('storage/' . $ad->image_path) }}" draggable="false">
                    </div>
                    <div class="container pos-vertical-center">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <br>
                                <h3>
                                    @if(app()->getLocale() == 'ar' )
                                        {!! $ad->ar_title !!}
                                    @else
                                        {!! $ad->title !!}
                                    @endif

                                    </h3>

                                <p class="desc">
                                    @if(app()->getLocale() == 'ar' )
                                        {{strip_tags($ad->ar_description)}}
                                    @else
                                        {{strip_tags($ad->description)}}
                                    @endif

                                </p><br>

                                <a class="btn btn--white" href="{{route('courseDesc' ,['section'=>$ad])}}">
                                    <span class="btn__text">{{ app()->getLocale() == 'ar' ? 'قراءة المزيد' : 'Read More' }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    </li>
                @endforeach

                <li class="imagebg clone" data-overlay="3" aria-hidden="true"
                    style="width: 1351px; float: left; display: block;">
                    <div class="background-image-holder"
                         style="background: url(&quot;img/home7.jpg&quot;); opacity: 1; ">
                        <img alt="image" src="/new/img/home2.jpg" draggable="false">
                    </div>
                    <div class="container job">
                        <div class="row">
                            <div class="col-md-6 col-sm-7 " style="">
                                <br>
                                <h2 style="">@lang('home.career_slider_title')</h2>
                                <a href="{{route('our_careers')}}"><h3>@lang('home.career_slider_link')</h3></a>
                            </div>
                        </div>
                    </div>
                </li>


            </ul>
        </div>
        <ul class="flex-direction-nav">
            <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li>
            <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
        </ul>
    </section>



    <section class="imageblock imageblock--lg section-snippet-services-2 bg--secondary">
        <div class="imageblock__content col-md-5 col-sm-4 pos-right hidden-xs">
            <div class="background-image-holder">
                <img alt="image" src="/new/img/home1.jpg"/>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-sm-push-1">
                    <div class="section-title">
                        <h6>
                            @lang('home.slider_title')
                        </h6>
                        <hr>
                    </div>
                    <div class="slider" data-paging="true" data-animation="slide" style="direction: ltr">
                        @if(app()->getLocale() =='ar')
                        <ul class="slides" >
                            @else
                                <ul class="slides">
                                @endif
                            <li>
                                <i class="icon icon-compass"></i>

                                   <h2>
                                    @lang('home.bottom_slider_title_01')
                                    <br class="hidden-xs"/> @lang('home.bottom_slider_title_1')
                                    </h2>


                                    <p>

                                    @lang('home.bottom_slider_sentence_1')
                                </p>
                                <a href="#" class="link-underline">@lang('home.bottom_slider_link')</a>
                            </li>
                            <li>
                                <i class="icon icon-strategy"></i>
                                <h2>
                                    @lang('home.bottom_slider_title_02')
                                    <br class="hidden-xs"/> @lang('home.bottom_slider_title_2')
                                </h2>
                                    <p>
                                    @lang('home.bottom_slider_sentence_2')
                                </p>

                                <a href="#" class="link-underline">@lang('home.bottom_slider_link')</a>
                            </li>
                            <li>
                                <i class="icon icon-linegraph"></i>
                                <h2>
                                    @lang('home.bottom_slider_title_03')

                                    <br class="hidden-xs"/>@lang('home.bottom_slider_title_3')
                                </h2>
                               <p>
                                    @lang('home.bottom_slider_sentence_3')
                                </p>
                                <a href="" class="link-underline">@lang('home.bottom_slider_link')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>





@endsection

@section('script')
    <script>
        $(function () {
            $('.desc').succinct({
                size: 100
            });
        });
    </script>
    <script>
        @if(isset($settings->logo))
        var nav = document.getElementById("nav");
        if(nav.classList.contains("bg--dark")) {
            document.getElementById("logo").src = "{{ asset('storage/' . $settings->logo) }}";
        }
        @endif
    </script>
    <script>

    </script>
@endsection