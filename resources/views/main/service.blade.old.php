@extends('main.layouts.layout')
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    {{ Breadcrumbs::render('services' , $sub , $parent) }}
                    <hr>
                </div>
            </div>
            <!--end of row-->
            <div class="row" style="margin: 0px; margin: 0px;">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center" style="padding: 0px; margin: 0px; text-align: center" >
                    <h1>
                        @if(app()->getLocale() == 'ar' )
                            {!! $parent->ar_title !!}
                        @else
                            {!! $parent->title !!}
                        @endif
                       </h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <br>
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <h4>
                        @if(app()->getLocale() == 'ar' )
                            {!! $sub->ar_title !!}
                        @else
                            {!! $sub->title !!}
                        @endif
                    </h4>
                    <p>
                        @if(app()->getLocale() == 'ar' )
                            {!! $sub->ar_description !!}
                        @else
                            {!! $sub->description !!}
                        @endif
                    </p>

                </div>
                <div class="col-md-4">

                    @foreach($services as $sub)
                        <ul>
                            <li>
                                <a class="link-underline" href="{{route('service.show' , ['section' =>$parent , 'sub' =>$sub])}}">
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

                <div class="col-sm-8 text-center">

                </div>
            </div>

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