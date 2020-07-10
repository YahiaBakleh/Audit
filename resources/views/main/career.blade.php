@extends('main.layouts.layout')
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    {{ Breadcrumbs::render('careers' , $section) }}
                    <hr>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col-md-8 col-md-offset-3 text-center">
                    <h2>
                        @if(app()->getLocale() == 'ar' )
                            {{strip_tags($section->ar_title)}}
                        @else
                            {{strip_tags($section->title)}}
                        @endif

                        <br class="hidden-xs">
                    </h2>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section><br>
    <section class="section-case-study-single">
        <div class="container">

        @foreach($sub_section as $sub)

            <!--Section: Main info-->
                <section class="mt-5 wow fadeIn">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6 mb-4">

                            <img src="{{ asset('storage/' . $sub->image_path) }}" class="img-fluid z-depth-1-half"
                                 alt=""
                                 style="width: 1000px; height: 500px; object-fit: cover;">

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 mb-4">
                            <!-- Main heading -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 col-sm-7 ">
                                        <h3>  @if(app()->getLocale() == 'ar' )
                                                {!! $sub->ar_title !!}
                                            @else
                                                {!! $sub->title !!}
                                            @endif
                                        </h3>
                                        <p>
                                            @if(app()->getLocale() == 'ar' )
                                                {!! $sub->ar_description !!}
                                            @else
                                                {!! $sub->description !!}
                                            @endif
                                        </p>
                                        <br><br>

                                        <a href="#" class="btn" data-toggle="modal" data-target="#exampleModal"  data-whatever="{{$sub->id}}">
                                <span class="btn__text">
                                    @lang('career.apply')
                                </span>
                                            <i class="ion-arrow-right-c"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--end of row-->
                            </div>


                        </div>


                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </section>
                <!--Section: Main info-->
            @endforeach
        </div>
        <!--end of container-->
    </section>

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
                            <input type="hidden" name="career_id" value="{{}}" id="career_id" >
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
                            <div class="checkbox-group required">
                                <input type="radio" name="gender" value="male"> Male<br>
                                <input type="radio" name="gender" value="female"> Female<br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Marital Status :</label><br>
                            <input type="radio" name="marital_status" value="single"> Single<br>
                            <input type="radio" name="marital_status" value="married"> Married<br>
                            <input type="radio" name="marital_status" value="divorced"> Divorced<br>
                            <input type="radio" name="marital_status" value="widowed"> Widowed<br>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Military Service :</label><br>
                            <input type="radio" name="military_service" value="exempted"> Exempted<br>
                            <input type="radio" name="military_service" value="performed"> Performed<br>
                            <input type="radio" name="military_service" value="postponed"> Postponed<br>
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
                            <label for="message-text" class="col-form-label"><strong>Please Upload your CV here , max
                                    size
                                    10MG with Extension pdf or word</strong></label><br>
                            <input type="file" class="form-control" name="cv" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        style="margin-top:14px;">Close
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" id="submit-button">Apply</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        @endsection

        @section('script')
            <script type="text/javascript">
                $("#nav").removeClass("nav--absolute nav--transparent bg--dark");
                $("#nav").addClass(' bg--primary');
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
@endsection