@extends('main.layouts.layout')
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{ Breadcrumbs::render('press_') }}
                    <hr>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                    <h1>Press Release</h1>
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

                    @foreach($press_releases as $press_release)
                        <a class="news-article-link" href="{{route('press_release' ,['section'=>$press_release])}}">
                            <div class="news-article-snippet boxed imagebg" data-scrim-bottom="9">
                                <div class="background-image-holder" style="background: url(&quot;img/home2.jpg&quot;); opacity: 1;">
                                    <img alt="image" src="{{ asset('storage/' . $press_release->image_path) }}">
                                </div>
                                <h3>{!! $press_release->title !!}</h3>
                                <p >{{strip_tags($press_release->description)}}   </p>
                                <span>Read More</span>
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
    <script>
        $(function(){
            $('p').succinct({
                size: 100
            });
        });
    </script>
@endsection