@extends('main.layouts.layout')
@section('content')
<section class="page-title section--pullup bg--secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            {{ Breadcrumbs::render('our_careers') }}
                            <hr>
                        </div>
                    </div>
                    <!--end of row-->

                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>

<section>
    <div class="container">
        <div class="row">
            @foreach($careers as $career)
                <div class="col-md-6">
                    <div class="hover-element case-study-element hover--active">
                        <div class="hover-element__initial text-center">
                            <h4 style="text-align: center">
                                @if(app()->getLocale() == 'ar' )
                                    {{strip_tags($career->ar_title)}}
                                @else
                                    {{strip_tags($career->title)}}
                                @endif
                            </h4>
                            <p class="$career">
                                {!! $career->descrption !!}
                            </p>
                            <a class="link-underline" href="{{route('career.show',['section' =>$career])}}">@lang('career.show') </a>
                        </div>
                        <div class="hover-element__reveal" data-overlay="7">
                            <div class="background-image-holder" style="background: url(&quot;img/case-study-2.jpg&quot;); opacity: 1;">
                                <img alt="image" src="/new/img/case-study-2.jpg">
                            </div>
                        </div>
                    </div>
                    <!--end of case study-->
                </div>
            @endforeach

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