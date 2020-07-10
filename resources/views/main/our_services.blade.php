@extends('main.layouts.layout')
@section('content')
<section class="page-title section--pullup bg--secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            {{ Breadcrumbs::render('our_services') }}
                            <hr>
                        </div>
                    </div>
                    <!--end of row-->

                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
<section class="section-snippet-services" id="services">
    <div class="container">
        <div class="row">
            <div class="icon-title">
                <span class="h6">@lang('home.left_compass')</span>
                <i class="icon-compass icon"></i>
                <span class="h6">@lang('home.right_compass')</span>
            </div>
        </div>
        <!--end of row-->
        <div class="row">
            <div class="col-sm-12 text-center">

                <h2>@lang('services.title')</h2>
                <br class="hidden-xs">
                <p style="text-align: left">
                  @lang('services.description')
                </p><br>
                <br>
            </div>
        </div>
        <!--end of row-->
        <div class="row">
            @foreach($services as $service)
                <div class="col-sm-6">
                    <div class="hover-element service-element hover--active" style="height: 550px;">
                        <div class="hover-element__initial">
                            <h3 style="padding-bottom: 5px;">
                                @if(app()->getLocale() == 'ar' )
                            {!! $service->ar_title !!}
                                @else
                                    {!! $service->title !!}
                                    @endif
                            </h3>
                            <p>
                                @if(app()->getLocale() == 'ar' )
                                    {!! $service->ar_description  !!}
                                @else
                                    {!! $service->description  !!}
                                @endif

                                <br class="hidden-xs hidden-sm">

                            </p>

                            @foreach($service->sub_section as $sub)
                                <ul>
                                    <li>
                                        <a class="link-underline" href="{{route('service.show' , ['section' =>$service , 'sub' =>$sub])}}">
                                            @if(app()->getLocale() == 'ar' )
                                                {!! $sub->ar_title !!}
                                            @else
                                                {!! $sub->title !!}
                                            @endif
                                            </a>
                                    </li>
                                </ul>
                            @endforeach

                        </div>
                        <div class="hover-element__reveal" data-overlay="7">
                            <div class="background-image-holder" style="background: url(&quot;img/service1.jpg&quot;); opacity: 1;">
                                <img alt="image" src="{{ asset('storage/' . $service->image_path) }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!--end of row-->
        <!--<div class="row">
            <div class="col-sm-12 text-center">
                <a href="#" class="btn">
                            <span class="btn__text">
                                View All Our Services
                            </span>
                    <i class="ion-arrow-right-c"></i>
                </a>
            </div>
        </div>-->
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
@endsection
@section('script')
    <script type="text/javascript">
        $( "#nav" ).removeClass( "nav--absolute nav--transparent bg--dark" );
        $("#nav").addClass(' bg--primary');
    </script>
@endsection