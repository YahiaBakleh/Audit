@extends('main.layouts.layout')
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{ Breadcrumbs::render('press' , $press_release) }}
                    <hr>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                    <h1>{!! $press_release->title !!}</h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section>
        <div class="container">
            <div class="row">
                <article>

                    <img class="col-sm-12" alt="Pic" src="{{ asset('storage/' . $press_release->image_path) }}">

                    <p>
                        {!! $press_release->description !!}
                    </p>

                </article>
                <hr>
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