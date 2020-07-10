@extends('main.layouts.layout')
@section('style')
        <meta charset="utf-8">
        <title>Partner HTML Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300%7CSource+Sans+Pro:400,300,600,400italic' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/et-line.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <style>
            [data-tooltip] {
                position: relative;
                margin: 20px 0px 0px 0px;
            }
            ul li {
                text-align: justify;
                margin-left:50px
            }
            
        </style>
@endsection
@section('content')
    <div class="gradient--active">

        <section class="page-title section--pullup bg--secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                                <li>
                                <a href="{{route('website')}}">@lang('nav.home')</a>
                                </li>
                                <li>
                                <a href="#">@lang('nav.team')</a>
                                </li>
                            </ol>
                            <hr>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1>
                                @lang('team.title')
                            </h1>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>

            <section class="section-team-small">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-4 col-xs-6"  style="min-width:1000px">
                            <div class="team-member team-member--small">
                            <div data-tooltip="Team Memeber">
                            <img alt="Image" id='image' class="imag" src="{{ asset('storage/' . $memeber->image_path) }}" style="float:left;"  ></div>
                                <div style="float:right; width:600px" >
                                <span class="team-member__role">
                                    @if(app()->getLocale() == 'ar' )
                                        {!! $memeber->ar_title !!}
                                    @else
                                        {!! $memeber->title !!}
                                    @endif
                                </span>
                                    <p>
                                            @if(app()->getLocale() == 'ar' )
                                            {!!$memeber->ar_description!!}
                                            @else
                                            {!!$memeber->description!!}
                                            @endif
                                    </p>
                                    <div style="margin:20px 100px 20px 100px">                                    
                                        <p class="link-underline">{{$memeber->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--end of small team member-->
                        </div>
                    

                    </div>

                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>


    </div>
@endsection
@section('script')
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/flexslider.min.js"></script>
<script src="js/scripts.js"></script>
@endsection