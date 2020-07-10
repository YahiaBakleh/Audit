<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BASSEL SALEH & CO</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


    <link rel="stylesheet" href="/css/tabs.css">
    <link rel="stylesheet" href="/css/flipclock.css">
    <style>
        .font_custom {
            font-family: 'Oswald', sans-serif;
        }

        .chimg {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 100%;
            height: 200px;
            vertical-align: middle;
            cursor: pointer;
            object-fit: cover;
        }

        .content {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .border_div {
            border-style: solid;
            border-width: 5px;
            border-color: darkcyan;

        }

        .custom {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .custom input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        .custom :hover input ~ .checkmark {
            background-color: #ccc;
        }

        .custom input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom input:checked ~ .checkmark:after {
            display: block;
        }

        .custom .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

    </style>

</head>

<body>

<!-- Start your project here-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="clock-2" style="margin:2em;"></div>
        </div>
    </div>
</div>

</div>

<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ action('HomeController@gradeTest') }}" method="post" id="pm2form" >
                {{csrf_field()}}
                <input type="text" style="display: none;" name="test_id" value="{{ $test->id }}">
                <div id="tabs">

                    <ul>

                        @foreach($test->groups as $group)
                            <li><a href="#fragment-{{$loop->index}}">{{ $loop->index + 1 }}</a></li>
                        @endforeach
                    </ul>


                    @foreach($test->groups as $group)

                        <div id="fragment-{{$loop->index}}" class="ui-tabs-panel">
                            @foreach($group->questions as $question)
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-top: 1em; margin-bottom: 2em">
                                        <h3><span class="font_custom">{{ $loop->index + 1 }}.</span> <span
                                                    class=""> {!! $question->title !!}</span>
                                            <span class="" style="color: gray; font-size: small ;right: 500px; ">{{ $question->score }}
                                                points</span></h3>
                                        @if($q_image = $question->image_path)
                                            <div>
                                                <img src="{{ asset('storage/' . $q_image) }}" alt=""height="320px" width="1000px"
                                                     class="center">
                                            </div>
                                        @endif
                                    </div>
                                    @if($question->is_paraghraph)
                                        <div class="col-md-12">
                                    <textarea name="{{ $question->id }}" class="form-control"
                                              placeholder="your answer..." style="width: 100%;" rows="4"></textarea>
                                        </div>
                                    @else
                                        <div class="col-md-12 form-check">
                                            <div class="row">
                                                @foreach($question->choices->sortBy('id') as $key => $choice)
                                                    @if($path = $choice->image_path)
                                                            <div style="display:{{$style['displayFlex']}}">
                                                        @else
                                                            <div style="display:{{$style['displayBlock']}};">
                                                    @endif                                                
                                                    <div class="col-lg-2 col-md-2 col-sm-4" style="font-family: 'Roboto', sans-serif;">
                                                        <input id="{{ $choice->id }}"
                                                               {{ !$key ? 'required' : '' }} class="form-check-input"
                                                               type="radio"
                                                               name="{{ $question->id }}"
                                                               value="{{ $choice->id }}">
                                                        @if($path = $choice->image_path)
                                                                <label for="{{ $choice->id }}" style="width:{{$style['width200']}}">
                                                            @else
                                                                <label for="{{ $choice->id }}" style="width:{{$style['width1200']}}; display:block;">
                                                        @endif
                                                            <span class="custom"> {!! $choice->title !!} </span>
                                                            @if($path = $choice->image_path)

                                                                    <img src="{{ asset('storage/'.$path) }}"
                                                                         class="rounded float-left img-responsive chimg"
                                                                         alt="{{ $choice->title }}" width="200px" height="180px">

                                                            @endif
                                                        </label>
                                                    </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <hr style="margin: 2em">
                            @endforeach

                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>

</div>
<!-- Card -->

<!-- /Start your project here-->

<!-- SCRIPTS -->
<!-- JQuery -->

<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.7.custom.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script type="text/javascript">
    $(function () {

        var $tabs = $('#tabs').tabs();

        $(".ui-tabs-panel").each(function (i) {

            var totalSize = $(".ui-tabs-panel").size() - 1;
            console.log('i == ',i);
            console.log(totalSize);

            if (i != totalSize) {
                next = i + 1;
                $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next Page &#187;</a>");
            }

            if (i != 0) {
                prev = i -1 ;
                $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev Page</a>");
            }

            if ( i == totalSize && i != 0 ) {
                $(this).append("<a href='#' id='submit_button' class='next-tab mover' rel='" + next + "'>Submit &#187;</a>");
            }

            if(i==0 && totalSize==0)
            {
                $(this).append("<a href='#' id='submit_button' class='next-tab mover' >Submit &#187;</a>");
            }

        });

        $('.next-tab, .prev-tab').click(function () {
            $tabs.tabs('select', $(this).attr("rel"));
            return false;
        });
    });
</script>
<script src="{{ asset('js/flipclock.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var a = true ;

            $("#submit_button").bind("click", function (e) {
                if(a) {
                    a = false;
                    $("#pm2form").trigger("submit", function (e) {
                        var form = $(this);
                        var data = $(this).serialize();
                        var url = form.prop('action');
                        $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: data,
                            success: function (data) {

                                alert('success');
                            },
                        });
                    });
                }

            });





        var time = "{{$test->time}}";

        var s = time.split(':')
        if(s[2] == '00')
            var seconds = s[0] * 3600 + s[1] * 60
        else
        var seconds = s[0] * 3600 + s[1] * 60 + s[2];
        console.log(seconds);
        var diff = seconds;
        $('.clock-2').FlipClock(diff, {
            clockFace: 'HourlyCounter',
            countdown: true,
            callbacks: {
                stop: function() {

                    $("#submit_button").click();
                }
                }
        });
    });
</script>
<script type="text/javascript" >
    $(window).bind('beforeunload', function() { 
        $("#submit_button").click();
    });
    // function preBack(){
    //     window.history.forward();
    // }
    // setTimeout("preBack()",0);
    // window.onunload=function(){
    //     null;
    // };
    function preventBack(){
        window.history.pushState(null,null,location.href);
        window.onpopstate=function(){
            history.go(1);
        };
    };
    preventBack();
    
// disable f5 from refrsh 
// slight update to account for browsers not supporting e.which
function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
// To disable f5
    /* jQuery < 1.7 */
$(document).bind("keydown", disableF5);
/* OR jQuery >= 1.7 */
$(document).on("keydown", disableF5);

// To re-enable f5
    /* jQuery < 1.7 */
$(document).unbind("keydown", disableF5);
/* OR jQuery >= 1.7 */
$(document).off("keydown", disableF5);

</script>
<script>
    // $(function()
    // {
    //     var spans = $('span.custom');
    // //     var text = span.text();
    //     var rows = $('span.custom').closest('div.row');
    //     var labels = $('label');
    //         if(label.has('img') ){
    //                 row.css('display','flex');
    //                 label.css('width','200px');
    //         }
    //         if(text!==null ||"" ){
    //                 row.css('display','block');
    //                 label.css('width','1200px');
    //                 }
    //  
    //     var i=0;
    //     for(i;i<rows.length;i++)
    //     {
    //             if(labels[i].has('img') )
    //             {
    //                     rows[i].css('display','flex');
    //                     labels[i].css('width','200px');
    //             } 
    //             if(spans[i].text()!==null ||"" )
    //             {
    //                     rows[i].css('display','block');
    //                     labels[i].css('width','1200px');
    //             }                
    //     }
    // console.log('done'.i);
    // }  
    // console.log('done');
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BASSEL SALEH & CO</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


    <link rel="stylesheet" href="/css/tabs.css">
    <link rel="stylesheet" href="/css/flipclock.css">
    <style>
        .font_custom {
            font-family: 'Oswald', sans-serif;
        }

        .chimg {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 100%;
            height: 200px;
            vertical-align: middle;
            cursor: pointer;
            object-fit: cover;
        }

        .content {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .border_div {
            border-style: solid;
            border-width: 5px;
            border-color: darkcyan;

        }

        .custom {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .custom input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        .custom :hover input ~ .checkmark {
            background-color: #ccc;
        }

        .custom input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom input:checked ~ .checkmark:after {
            display: block;
        }

        .custom .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

    </style>

</head>

<body>

<!-- Start your project here-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="clock-2" style="margin:2em;"></div>
        </div>
    </div>
</div>

</div>

<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ action('HomeController@gradeTest') }}" method="post" id="pm2form" >
                {{csrf_field()}}
                <input type="text" style="display: none;" name="test_id" value="{{ $test->id }}">
                <div id="tabs">

                    <ul>

                        @foreach($test->groups as $group)
                            <li><a href="#fragment-{{$loop->index}}">{{ $loop->index + 1 }}</a></li>
                        @endforeach
                    </ul>


                    @foreach($test->groups as $group)

                        <div id="fragment-{{$loop->index}}" class="ui-tabs-panel">
                            @foreach($group->questions as $question)
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-top: 1em; margin-bottom: 2em">
                                        <h3><span class="font_custom">{{ $loop->index + 1 }}.</span> <span
                                                    class=""> {!! $question->title !!}</span>
                                            <span class="" style="color: gray; font-size: small ;right: 500px; ">{{ $question->score }}
                                                points</span></h3>
                                        @if($q_image = $question->image_path)
                                            <div>
                                                <img src="{{ asset('storage/' . $q_image) }}" alt=""height="320px" width="1000px"
                                                     class="center">
                                            </div>
                                        @endif
                                    </div>
                                    @if($question->is_paraghraph)
                                        <div class="col-md-12">
                                    <textarea name="{{ $question->id }}" class="form-control"
                                              placeholder="your answer..." style="width: 100%;" rows="4"></textarea>
                                        </div>
                                    @else
                                        <div class="col-md-12 form-check">
                                            <div class="row">
                                                @foreach($question->choices->sortBy('id') as $key => $choice)
                                                    @if($path = $choice->image_path)
                                                            <div style="display:{{$style['displayFlex']}}">
                                                        @else
                                                            <div style="display:{{$style['displayBlock']}};">
                                                    @endif                                                
                                                    <div class="col-lg-2 col-md-2 col-sm-4" style="font-family: 'Roboto', sans-serif;">
                                                        <input id="{{ $choice->id }}"
                                                               {{ !$key ? 'required' : '' }} class="form-check-input"
                                                               type="radio"
                                                               name="{{ $question->id }}"
                                                               value="{{ $choice->id }}">
                                                        @if($path = $choice->image_path)
                                                                <label for="{{ $choice->id }}" style="width:{{$style['width200']}}">
                                                            @else
                                                                <label for="{{ $choice->id }}" style="width:{{$style['width1200']}}; display:block;">
                                                        @endif
                                                            <span class="custom"> {!! $choice->title !!} </span>
                                                            @if($path = $choice->image_path)

                                                                    <img src="{{ asset('storage/'.$path) }}"
                                                                         class="rounded float-left img-responsive chimg"
                                                                         alt="{{ $choice->title }}" width="200px" height="180px">

                                                            @endif
                                                        </label>
                                                    </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <hr style="margin: 2em">
                            @endforeach

                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>

</div>
<!-- Card -->

<!-- /Start your project here-->

<!-- SCRIPTS -->
<!-- JQuery -->

<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.7.custom.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script type="text/javascript">
    $(function () {

        var $tabs = $('#tabs').tabs();

        $(".ui-tabs-panel").each(function (i) {

            var totalSize = $(".ui-tabs-panel").size() - 1;
            console.log('i == ',i);
            console.log(totalSize);

            if (i != totalSize) {
                next = i + 1;
                $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next Page &#187;</a>");
            }

            if (i != 0) {
                prev = i -1 ;
                $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev Page</a>");
            }

            if ( i == totalSize && i != 0 ) {
                $(this).append("<a href='#' id='submit_button' class='next-tab mover' rel='" + next + "'>Submit &#187;</a>");
            }

            if(i==0 && totalSize==0)
            {
                $(this).append("<a href='#' id='submit_button' class='next-tab mover' >Submit &#187;</a>");
            }

        });

        $('.next-tab, .prev-tab').click(function () {
            $tabs.tabs('select', $(this).attr("rel"));
            return false;
        });
    });
</script>
<script src="{{ asset('js/flipclock.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var a = true ;

            $("#submit_button").bind("click", function (e) {
                if(a) {
                    a = false;
                    $("#pm2form").trigger("submit", function (e) {
                        var form = $(this);
                        var data = $(this).serialize();
                        var url = form.prop('action');
                        $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: data,
                            success: function (data) {

                                alert('success');
                            },
                        });
                    });
                }

            });





        var time = "{{$test->time}}";

        var s = time.split(':')
        if(s[2] == '00')
            var seconds = s[0] * 3600 + s[1] * 60
        else
        var seconds = s[0] * 3600 + s[1] * 60 + s[2];
        console.log(seconds);
        var diff = seconds;
        $('.clock-2').FlipClock(diff, {
            clockFace: 'HourlyCounter',
            countdown: true,
            callbacks: {
                stop: function() {

                    $("#submit_button").click();
                }
                }
        });
    });
</script>
<script type="text/javascript" >
    $(window).bind('beforeunload', function() { 
        $("#submit_button").click();
    });
    // function preBack(){
    //     window.history.forward();
    // }
    // setTimeout("preBack()",0);
    // window.onunload=function(){
    //     null;
    // };
    function preventBack(){
        window.history.pushState(null,null,location.href);
        window.onpopstate=function(){
            history.go(1);
        };
    };
    preventBack();
    
// disable f5 from refrsh 
// slight update to account for browsers not supporting e.which
function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
// To disable f5
    /* jQuery < 1.7 */
$(document).bind("keydown", disableF5);
/* OR jQuery >= 1.7 */
$(document).on("keydown", disableF5);

// To re-enable f5
    /* jQuery < 1.7 */
$(document).unbind("keydown", disableF5);
/* OR jQuery >= 1.7 */
$(document).off("keydown", disableF5);

</script>
<script>
    // $(function()
    // {
    //     var spans = $('span.custom');
    // //     var text = span.text();
    //     var rows = $('span.custom').closest('div.row');
    //     var labels = $('label');
    //         if(label.has('img') ){
    //                 row.css('display','flex');
    //                 label.css('width','200px');
    //         }
    //         if(text!==null ||"" ){
    //                 row.css('display','block');
    //                 label.css('width','1200px');
    //                 }
    //  
    //     var i=0;
    //     for(i;i<rows.length;i++)
    //     {
    //             if(labels[i].has('img') )
    //             {
    //                     rows[i].css('display','flex');
    //                     labels[i].css('width','200px');
    //             } 
    //             if(spans[i].text()!==null ||"" )
    //             {
    //                     rows[i].css('display','block');
    //                     labels[i].css('width','1200px');
    //             }                
    //     }
    // console.log('done'.i);
    // }  
    // console.log('done');
</script>
</body>
</html>
