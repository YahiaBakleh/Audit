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
<section >


    <!-- end: header -->

    <div class="inner-wrapper">

        <section role="main" class="" style="width: 100%">


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

                    </div>

                </div>
            </div>
            <!-- end: page -->
        </section>
    </div>


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