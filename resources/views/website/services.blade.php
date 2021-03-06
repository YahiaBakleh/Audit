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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">


    <style type="text/css">

        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331 !important;
            }
        }

        p, ul, a, h3 {
            font-family: 'Open Sans', sans-serif;
        }

        a:hover {
            color: grey;
            text-decoration: none;

        }


        .dr {
            color: white;
            font-size: 16px;
            font-weight: normal;
        }

        body, html {
            height: 100%;
        }

        .bg {
            /* The image used */
            /* background-image: url("");*/

            /* Full height */
            height: 50px;


        }

    </style>
</head>

<body style="background-color:black">

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" style="background-color: black">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="https://mdbootstrap.com/docs/jquery/" target="_blank">

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
                    <a class="nav-link" href="{{route('website')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <!-- Dropdown -->   <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Services</a>

                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" style="background-color: black">
                        @foreach($services as $service)

                            <a href="{{route('service.show',['section' =>$service])}}" data-pagelinkto="portfoliopage"
                               class="dr" style="color: white ;"> {{strip_tags($service ->title)}}</a><br>
                        @endforeach
                    </div>
                </li>

            </ul>

        </div>

    </div>
</nav>
<!-- Navbar -->

<!--Carousel Wrapper-->
<div class="bg">


</div>


<!--Main layout-->
@if($sub_section)
<main>
    <div class="container">


        <!--Section: Main info-->
            <section class="mt-5 wow fadeIn">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 mb-12">
                        <!-- Main heading -->

                        <!-- Main heading -->
                        {!! $sub_section->title !!}
                        <p style="color: #1e7e34">
                            <!-- Main heading -->

                        <hr>

                        <div style="color: #fdf5ce">
                            {!! $sub_section->description !!}
                        </div>
                        <!-- CTA -->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!--Section: Main info-->

        <hr class="my-5">

    </div>
</main>
@endif
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->

    <!--/.Call to action-->


    <!-- Social icons -->

    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3" style=" background-color: black;
  color: #0c0c0c;">
        <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank" style="color: grey"> BASSEL SALEH & CO @
            2019 </a><br><br>
        <div class="pb-4" style="color: grey">


            @if(isset($settings->facebook))
                <a href="{{ $settings->facebook }}" target="_blank" style="color: grey">
                    <i class="fab fa-facebook-f mr-3"></i>
                </a>
            @endif

            @if(isset($settings->whatsapp))
                <a href="{{ $settings->whatsapp }}" target="_blank" style="color: grey">
                    <i class="fab fa-whatsapp mr-3"></i>
                </a>
            @endif

            @if(isset($settings->instagram))
                <a href="{{ $settings->instagram }}" target="_blank" style="color: grey">
                    <i class="fab fa-instagram mr-3"></i>
                </a>
            @endif

            @if(isset($settings->linkedIn))
                <a href="{{ $settings->linkedIn }}" target="_blank" style="color: grey">
                    <i class="fab fa-linkedin mr-3"></i>
                </a>
            @endif


        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply for the Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ action('WebsiteController@apply') }}" enctype="multipart/form-data">
                {{ csrf_field()}}
                {{ method_field('POST') }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" required>
                        <input type="hidden" name="career_id" value="" id="career_id">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Father Name:</label>
                        <input type="text" class="form-control" name="father_name" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Family Name:</label>
                        <input type="text" class="form-control" name="family_name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Birth Date:</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email Address:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Gender:</label><br>
                        <input type="checkbox" name="male" value="male"> Male<br>
                        <input type="checkbox" name="female" value="female"> Female<br>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Marital status :</label><br>
                        <input type="checkbox" name="single" value="single"> Single<br>
                        <input type="checkbox" name="married" value="married"> Married<br>
                        <input type="checkbox" name="divorced" value="divorced"> Divorced<br>
                        <input type="checkbox" name="widowed" value="widowed"> Widowed<br>

                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Military Service :</label><br>
                        <input type="checkbox" name="exempted" value="exempted"> Exempted<br>
                        <input type="checkbox" name="performed" value="performed"> Performed<br>
                        <input type="checkbox" name="postponed" value="postponed"> Postponed<br>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><strong>Address</strong></label><br>
                        <label for="message-text" class="col-form-label">Country</label><br>
                        <input type="text" class="form-control" name="country" required>
                        <label for="message-text" class="col-form-label">Street Address</label><br>
                        <input type="text" class="form-control" name="street_address" required>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><strong>Phone numbers</strong></label><br>
                        <label for="message-text" class="col-form-label">Home</label><br>
                        <input type="text" class="form-control" name="number_home" required>
                        <label for="message-text" class="col-form-label">Mobile</label><br>
                        <input type="text" class="form-control" name="number_mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><strong>Please Upload your CV here , max size
                                10MG with Extension pdf or word</strong></label><br>
                        <input type="file" class="form-control" name="cv" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ************** END : HOME PAGE **************  -->


<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var career = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#career_id').val(career);
    })
</script>
</body>

</html>
