@extends('main.layouts.layout')

@section('style')
    <style>
        @media all and (min-width: 995px){
            .contact{
                padding-right: 60px;
            }
        }
    </style>
@endsection
@section('content')
    <section class="page-title section--pullup bg--secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('website')}}">@lang('nav.home')</a>
                    </li>
                    <li class="active">@lang('nav.contact')</li>
                </ol>
                <hr>
            </div>
        </div>
        <!--end of row-->
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>
                   @lang('contact.title')
                </h2>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
    <section class="section-contact-1">
        <div class="container-fluid contact">
            <div class="row">
                <div class="col-md-6 col-md-offset-1 col-sm-6">
                    <img alt="Image" src="/new/img/co.png" style="height:100%; width: 100%" >
                    <address>
                        {!! $settings->location ?? '' !!}
                    </address>
                    <h5 style="text-align: center">{!! $settings->email ?? '' !!}
                        @if(isset($settings->mobile))
                        <br>{{strip_tags($settings->mobile  ?? '')}}
                            @endif
                    </h5>
                </div>
                <div class="col-md-5">
                    <form class=""   action="{{route('message')}}" method="post">
                        {{method_field('POST')}}
                        {{ csrf_field()}}
                        <h6 class="text-center">Send An Enquiry</h6>
                        <hr>
                        <div class="form-body">
                            <div class="col-md-6">
                                <label>Name:</label>
                                <input class="validate-required" type="text" name="name" placeholder="Type Your Name">
                            </div>
                            <div class="col-md-6">
                                <label>Email Address:</label>
                                <input class="validate-required validate-email" type="email" name="email" placeholder="you@yoursite.com">
                            </div>
                            <div class="col-md-12">
                                <label>Phone Number:</label>
                                <input class="validate-required" type="text" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-sm-12">
                                <label>Your Message:</label>
                                <textarea class="validate-required" name="message" placeholder="Type your message" rows="4"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn">
                                            <span class="btn__text">
                                                Send Your Enquiry
                                            </span>
                                </button>
                            </div>
                        </div>
                    </form>
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