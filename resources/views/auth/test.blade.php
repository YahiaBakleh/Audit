<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
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
                background: #1C2331 !important;
            }
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
            <strong>Bassel Saleh</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <form method="post" action="/logout" class="form-inline my-2 my-lg-0">
                        {{ csrf_field() }}
                        <button class="btn btn-outline-white my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                </li>

            </ul>

        </div>

    </div>
</nav>
<!-- Navbar -->

<!-- Full Page Intro -->
<div class="view full-page-intro"
     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">

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

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->
                            <form name="" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                                <!-- Heading -->
                                <h3 class="dark-grey-text text-center">
                                    <strong>LOGIN IN </strong>
                                </h3>
                                <hr>

                                <div class="md-form">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" id="form3" class="form-control" >
                                    <label for="form3">Your User name</label>
                                </div>
                                <div class="md-form {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                    <input type="email" id="email" class="form-control" name="email"  required autofocus>
                                    <label for="form2">Your email</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="md-form">
                                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                                    <input type="password"  class="form-control"  id="password" type="password"  name="password" required>
                                    <label for="form2">Your Password</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-indigo waves-effect waves-light">Send</button>
                                    <hr>
                                    <fieldset class="form-check">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkbox1" class="form-check-label dark-grey-text">Remember Me </label>
                                    </fieldset>
                                </div>

                            </form>



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

</body>

</html>
