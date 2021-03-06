<div class="nav-container" style="direction: ltr">
    <nav>
        <div class="nav-bar nav--absolute nav--transparent bg--dark" data-fixed-at="400" id="nav">
            <div class="col-md-2 text-center-xs" style="padding: unset">
                <div class="nav-module logo-module">
                    @if(isset($settings->customizedlogo))
                        <a href="{{route('website')}}">
                            <img id="logo" class="logo" alt="logo"
                                 src="{{ asset('storage/' . $settings->customizedlogo) }}">
                        </a>
                    @endif
                </div>
            </div>
            <!--end cols-->

            <div class="nav-module menu-module col-md-10 col-xs-12 text-center text-left-xs">
            {{--Start Nav Bar--}}
                <ul class="menu">
                    {{--// Language switch button--}}
                    {{--Start Home--}}
                    @if(app()->getLocale() == 'en')
                        <li class="">
                            <a href="{{route('website')}}">
                                @lang('nav.home')
                            </a>

                        </li>
                    @else
                        <li>
                            <a class="" href="{{ route('login') }}">

                                @lang('nav.login')
                            </a>
                        </li>
                    @endif
                    {{--end Home --}}
                    
                    {{--Start Services --}}
                    @if(app()->getLocale() == 'en')
                        <li class="">
                            <a href="{{route('our_services')}}">
                                @lang('nav.services')
                            </a>
                        </li>
                    @else
                        <li class="has-dropdown">
                            <a href="#">
                                @lang('nav.vacancy')
                            </a>
                            @if(count($data['careers'] ) > 0 )
                                <ul>
                                    @foreach($data['careers'] as $career)
                                        <li>
                                            <a href="{{route('career.show',['section' =>$career])}}">
                                                @if(app()->getLocale() == 'ar' )
                                                    @if($career ->ar_title)
                                                        {{strip_tags($career ->ar_title)}}
                                                    @else
                                                        {{strip_tags($career ->title)}}
                                                    @endif
                                                @else
                                                    {{strip_tags($career ->title)}}
                                                @endif

                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                        </li>
                    @endif
                    {{--End Services --}}
                    
                    {{--Start Traning : T&D --}}
                    @if(app()->getLocale() == 'en')
                        <li class="">
                            <a href="{{route('training_courses')}}">
                                @lang('nav.training_courses')
                            </a>

                        </li>

                    @else
                        <li class="">
                            <a href="{{route('our_team')}}">
                                @lang('nav.team')
                            </a>
                        </li>

                    @endif
                {{--End Traning : T&D --}}
                    
                {{--Start Publications--}}
                <li class="has-dropdown">
                        <a href="#">
                           Publications
                        </a>
                @if(count($data['press'])> 0  || count($data['article']) > 0)
                    <ul>
                        @if(count($data['press'])> 0 )
                            <li>
                                <a href="{{route('press_releases')}}">
                                    News
                                </a>
                            </li>
                        @endif
                        @if(count($data['article']) > 0)
                            <li>
                                <a href="{{route('articles')}}">
                                        Articles
                                </a>
                            </li>
                        @endif
                    </ul>
                    @endif
                        </li>
                    {{--end Publications--}}
                        
                {{--Start Our Team--}}   
                @if(app()->getLocale() == 'en')
                    <li class="">
                        <a href="{{route('our_team')}}">
                            @lang('nav.team')
                        </a>
                    </li>
                @else
                    <li class="">
                    <a href="{{route('training_courses')}}">
                        @lang('nav.training_courses')
                    </a>

                    </li>
                @endif
                {{--end Our Team--}}     
                        
                        
                    @if(app()->getLocale() == 'en')
                        <li class="has-dropdown">
                            <a href="#">
                                @lang('nav.vacancy')
                            </a>
                            @if(count($data['careers'] ) > 0 )
                                <ul>
                                    @foreach($data['careers'] as $career)
                                        <li>
                                            <a href="{{route('career.show',['section' =>$career])}}">
                                                @if(app()->getLocale() == 'ar' )
                                                    @if($career ->ar_title)
                                                        {{strip_tags($career ->ar_title)}}
                                                    @else
                                                        {{strip_tags($career ->title)}}
                                                    @endif
                                                @else
                                                    {{strip_tags($career ->title)}}
                                                @endif

                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                        </li>
                    @else
                        <li class="">
                            <a href="{{route('our_services')}}">
                                @lang('nav.services')
                            </a>
                        </li>
                    @endif
                    
                    @if(app()->getLocale() == 'en')
                        <li class="has-dropdown">
                            <a href="#">
                                {{--@lang('nav.contact')--}}
                                About
                            </a>
                            <ul>
                                <li>
  
                                    {{--Start Our About Us/Company--}}
                                        @if(app()->getLocale() == 'en')
                                            <li class="">
                                                <a href="{{route('about')}}">
                                                    @lang('nav.about')
                                                </a>
                    
                                            </li>
                                        @else
                                            <li class="">
                                                <a href="{{route('contact')}}">
                                                    @lang('nav.contact')
                                                </a>
                                            </li>
                                        @endif
                                    {{--end Our About Us/Company--}}

                                    {{--Start Contact us--}}
                                     <li>                                    
                                        <a href="{{route('contact')}}">
                                            @lang('nav.contact')
                                        </a>
                                    </li>
                                    {{--end Contact us--}} 
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="">
                            <a href="{{route('about')}}">
                                @lang('nav.about')
                            </a>

                        </li>
                    @endif
                    @if(app()->getLocale() == 'en')

                        <li>
                            <a class="" href="{{ route('login') }}">

                                @lang('nav.login')
                            </a>
                        </li>
                    @else
                        <li class="">
                            <a href="{{route('website')}}">
                                @lang('nav.home')
                            </a>

                        </li>

                    @endif
                </ul>
            </div>
            <!--end nav module-->

            <!--end cols-->
        <!--<div class="col-md-2 text-right text-center-xs clearfix" style="white:100px;">
                <div class="nav-module">
                    <a class="btn btn--sm btn--white btn--unfilled" href="{{ route('login') }}">
                                <span class="btn__text">
                                  @lang('nav.login')
                </span>
        <i class="ion-bag"></i>
    </a>
</div>
</div>-->
            <!--end cols-->
        </div>
        <!--end nav bar-->
        <div class="nav-mobile-toggle visible-sm visible-xs">
            <i class="ion-drag"></i>
        </div>
        <!--end of toggle-->
    </nav>
</div>