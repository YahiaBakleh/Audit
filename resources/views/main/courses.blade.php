@extends('main.layouts.layout')
@section('content')
<section class="page-title section--pullup bg--secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            {{ Breadcrumbs::render('courses') }}
                            <hr>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                            <h2>@lang('courses.title')</h2>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

                            @foreach($courses as $course)
                            <a class="news-article-link" href="{{route('courseDesc' ,['section'=>$course])}}">
                                @if( app()->getLocale() == 'ar' )
                                <div class="news-article-snippet boxed imagebg" data-scrim-bottom="9"  style="text-align: right">
                                    @else
                                        <div class="news-article-snippet boxed imagebg" data-scrim-bottom="9">
                                        @endif
                                    <div class="background-image-holder" style="background: url(&quot;img/home2.jpg&quot;); opacity: 1;">
                                        <img alt="image" src="{{ asset('storage/' . $course->image_path) }}">
                                    </div>
                                    <h6>{{ app()->getLocale() == 'ar' ? 'تاريخ البدء' : 'Start Date :' }} {{$course->start_date}}</h6>
                                    <h3>
                                        @if(app()->getLocale() == 'ar' )
                                            {!! $course->ar_title !!}
                                        @else
                                            {!! $course->title !!}
                                        @endif
                                        </h3>
                                    <span>{{ app()->getLocale() == 'ar' ? 'قراءة المزيد' : 'Read More' }}</span>
                                </div>
                            </a>
                                @endforeach





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