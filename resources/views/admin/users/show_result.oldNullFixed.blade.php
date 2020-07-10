<!doctype html>
<html class="fixed search-results">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Admin - Results Test</title>
    <meta name="keywords" content="HTML5 Admin Template"/>
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css"/>
    <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme.css"/>

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/skins/default.css"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="/assets/vendor/modernizr/modernizr.js"></script>

</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="../" class="logo">

            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                 data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">




            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="/assets/images/basel.jpg" alt="Joseph Doe" class="img-circle"
                             data-lock-picture="assets/images/!logged-user.jpg"/>
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">BASSEL SALEH</span>
                        <span class="role">Administrator</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        {{--<li>--}}
                        {{--<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>--}}
                        {{--</li>--}}
                        <li>
                            <a id="logout" role="menuitem" tabindex="-1" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
    @include('admin.layouts.sidebar')
    <!-- end: sidebar -->

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Test Results</h2>


            </header>

            <!-- start: page -->
            <div class="search-content">

                <div class="search-toolbar">
                    <ul class="list-unstyled nav nav-pills">
                        <li class="active">
                            <a href="#everything" data-toggle="tab">Result</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="everything" class="tab-pane active">

                        <ul class="list-unstyled search-results-list">
                            @foreach($questions as $question)

                                <li>
                                    @if(!$question->is_paraghraph)
                                    <p class="result-type">
                                        <span class="label label-primary">{{ $question->score }}points</span>
                                            
                                        @if($user->questionChoice()->find($question->id))
                                             @if(\App\Models\Choice::find($user->questionChoice()->find($question->id)->pivot->choice_id )->is_correct )
                                                <span class="label label-success">True</span>
                                                @else
                                                <span class="label label-danger">False</span>

                                            @endif
                                        @else
                                             <span class="label label-danger">False</span>
                                        @endif

                                    </p>
                                    @endif
                                    <a href="pages-invoice.html" class="has-thumb">
                                        <div class="result-thumb" style="width:100px;">
                                            @if($q_image = $question->image_path)
                                                <img src="{{ asset('storage/' . $q_image) }}" alt="Invoice">
                                            @else
                                                <img src="/assets/images/projects/project-6.jpg" alt="Invoice">
                                            @endif
                                        </div>
                                        <div class="result-data">
                                            <p class="h3 title text-primary">Question {{ $loop->index + 1 }} </p>
                                            <p class="description"><b>{!! $question->title !!}</b></p>
                                            @if($question->is_paraghraph)
                                                @if($user->questionParagraph()->find($question->id))
                                                    <p class="description">{{$user->questionParagraph()->find($question->id)->pivot->paragraph}}</p>
                                                @else
                                                    <p class="description">Did not write answer </p>
                                                @endif
                                            @else
                                                @foreach($question->choices as $choice)


                                            <div class="checkbox-custom checkbox-primary">
                                                <div class="row">
                                                    <div class="col-sm-2" style="margin-top: 20px;">
                                                    @if($user->questionChoice()->find($question->id))
                                                        @if($user->questionChoice()->find($question->id)->pivot->choice_id == $choice->id)

                                                            <input type="checkbox" checked="" id="checkboxExample2">
                                                            <label for="checkboxExample2" style="margin-left: 20px;">{!! $choice->title  !!}</label>
                                                    </div>
                                                        @else

                                                            <input type="checkbox" id="checkboxExample2">
                                                            <label for="checkboxExample2" style="margin-left: 20px;">{!! $choice->title  !!}</label>
                                                    </div>                                                            
                                                        @endif
                                                    @else  
                                                            <input type="checkbox" id="checkboxExample2">
                                                            <label for="checkboxExample2" style="margin-left: 20px;">Did not select Choice</label>                                                    
                                                        @break
                                                    @endif

                                                    @if($path = $choice->image_path)

                                                            <div class="col-sm-4">
                                                            <img class="img-thumbnail" src="{{ asset('storage/'.$path) }}" alt="Invoice" style="width: 100px; height: 75px;">
                                                            </div>
                                                        @endif
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @endif

                                        </div>
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                        <hr class="solid mb-none"/>
                        {{$questions->appends(request()->input())->links()}}


                    </div>

                </div>
            </div>
            <!-- end: page -->
        </section>
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>

                        <ul>
                            <li>
                                <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </aside>
</section>

<!-- Vendor -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/javascripts/theme.init.js"></script>

</body>
</html>