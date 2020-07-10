<section class="imagebg image--light gradient--bg-fade section-cta-bottom background--top">
    <div class="background-image-holder" style="background: url(&quot;/new/img/about2.jpg&quot;); opacity: 1;">
        <img alt="image" src="/new/img/contact.jpg">
    </div>
    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-12 text-center">
                 <h2>
                     Ready to reach higher in business?
                 </h2>
                 <p>
                     Financial management and much more - speak to a our associate today.
                 </p><br>
                 <a href="book-consultation.html" class="btn">
                             <span class="btn__text">
                                 Book A Consultation
                             </span>
                     <i class="ion-arrow-right-c"></i>
                 </a>
                 <a href="services-listing.html" class="btn btn--transparent">
                             <span class="btn__text">
                                 Explore our services
                             </span>
                 </a>
             </div>-->
        </div>
    </div>
</section>

<footer class="bg--dark" style="direction: ltr; position: relative;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if(isset($settings->logo))
                    <img class="logo" alt="Logo" src="{{ asset('storage/' . $settings->logo) }}">
                @endif
            </div>

            <div class="col-sm-4">
                <p style="display: inline; ">

                    {!! $settings->location ?? '' !!}
                </p>

                <br>
                @if(isset($settings->mobile))
                    <span class="block">{!! $settings->mobile ?? '' !!}  </span>
                @endif

            </div>

            <div class="col-sm-4">
                <p style="; text-align: center">
                    @lang('footer.connect_us')
                </p>
            </div>
            <br>
            <div class="col-sm-4" style="direction: ltr">
                <ul>
                    @if(isset($settings->facebook))
                        <li>
                            <a href="{{ $settings->facebook }}">
                                <div class="icon--circle">
                                    <i class="icon socicon socicon-facebook"></i>
                                </div>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="#">
                            <div class="icon--circle">
                                <i class="icon socicon socicon-whatsapp"></i>
                            </div>
                        </a>
                    </li>

                    @if(isset($settings->linkedIn))
                        <li>
                            <a href="{{$settings->linkedIn}}">
                                <div class="icon--circle">
                                    <i class="icon socicon socicon-linkedin"></i>
                                </div>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="#">
                            <div class="icon--circle">
                                <i class="icon socicon socicon-instagram"></i>
                            </div>
                        </a>
                    </li>

                </ul>

                {{--<div class="language">--}}
                {{--<a href="{{ route('lang.switch', app()->getLocale() == 'ar' ? 'en' : 'ar') }}"--}}
                {{--data-pagelinkto="portfoliopage"--}}
                {{--class="="><i--}}
                {{--class="white fa fa-globe"></i> {{ app()->getLocale() == 'ar' ? 'الإنجليزية' : 'Arabic' }}--}}
                {{--</a>--}}
                {{--</div>--}}
            </div>
        </div>
        <!--end of row-->


        <!--end of row-->
    </div>
    <!--end of container-->
</footer>
<footer style="background-color: #EAEDED; padding-top:7px; padding-bottom:7px">
    <div class="container">

        <div class="row" style="    direction: ltr;">
            <span>&copy; Copyright 2019 BASSEL SALEH & CO All Rights Reserved</span>

        </div>
    </div>
</footer>