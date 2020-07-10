<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BASSEL SALEH & CO</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 1000px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="https://basselsalehco.com/" target="_blank">
            <strong>BASSEL SALEH & CO</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('website')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <form method="post" action="/logout" class="form-inline my-2 my-lg-0">
                        {{csrf_field()}}
                        <button class="btn btn-outline-white my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                </li>

            </ul>

        </div>

    </div>
</nav>
<!-- Navbar -->

<!-- Full Page Intro -->
<div class="view full-page-intro" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="container">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4 white-text text-center text-md-left">

                    <h1 class="display-4 font-weight-bold">BASSEL SALEH & CO </h1>

                    <hr class="hr-light">

                    <p>
                        <strong>Auditing & Accounting </strong>
                    </p>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-xl-5 mb-4">

                    <!--Card-->
                    <div class="card">
                        <div class="card-header">Welcome  {{Auth::user()->name}}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-info" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif


                            @if(auth()->user()->tests()->count())
                                @if(auth()->user()->toDoTests()->count())
                                    Please do these following tests
                                @else
                                    Thank you for doing all tests
                                @endif

                                <ul class="list-group" style="margin-top: 20px;">
                                    @foreach(auth()->user()->toDoTests()->get() as $test)
                                        <li class="list-group-item"><a
                                                    href="{{ action('HomeController@showStart', $test->id) }}"
                                                    style="text-decoration: none">{{ $test->name }}</a>
                                        </li>
                                    @endforeach
                                    @foreach(auth()->user()->doneTests()->get() as $test)
                                        <li class="list-group-item disabled">{{ $test->name }}
                                    @endforeach
                                </ul>
                            @else
                                No tests here yet for you!
                            @endif
                        </div>
                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
        <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

</div>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js"></script>

<script type="text/javascript">
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>

</body>

</html>
