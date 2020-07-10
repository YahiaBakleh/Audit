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
        .ulNoMargen{
            padding-inline-start:30px;
        }
        .fixCard{
            margin-top:100px;
            width :700px;
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
<div class="view full-page-intro" style="background-image: url('/main/images/b.png'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <!--Card-->
                    <div class="card fixCard">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->

                            <!-- Heading -->
                            <h3 class="dark-grey-text text-center">
                                <strong>Agreement and Conditions</strong>
                            </h3>
                            <hr>



                            <div>
                                <label for="checkbox1" class="form-check-label dark-grey-text" align-items-left">>Welcome to BASSEL SALEH & CO website, please read following Terms and Conditions carefully before using or reading any materials, check any information or go through exam process. By clicking "Agree" you are agree to be bound by these Terms and Conditions and our Privacy Policy. If you do not agree with all of these Terms and Conditions, you must discontinue using our site immediately.
                                <ul class="ulNoMargen">
<li>This section is intended for users who applied for vacancies at BASSEL SALEH & CO.</li>
<li>The information provided about exam is not intended for distribution to or use by any person or entity. </li>
<li>The content of this website is for evaluation purposes. It is subject to change without previous notice.</li>
<li>This website uses cookies to monitor browsing preferences. Any malicious or cheating activity will be reported.</li>
<li>This website contains material, which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, graphics and other important information. Reproduction of such material is strictly prohibited.</li>
<li>Unauthorized use of this website may give rise to a claim for damages and/or be a criminal offence.</li></ul>
</label>
                            </div><br>

                            <form action="{{ action('HomeController@agreementPost') }}" method="post">
                                {{csrf_field()}}
                                <div class="text-center">
                                    <button class="btn btn-success text-bold"><strong><h5>Agree</h5></strong></button>
                                </div>
                            </form>



                            <!-- Form -->

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
