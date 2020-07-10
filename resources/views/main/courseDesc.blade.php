@extends('main.layouts.layout')
@section('style')
    <style>
        .team-boxed {
            color: #313437;
            background-color: #f2f3f4;;
        }

        .team-boxed p {
            color: #7d8285;
        }

        .team-boxed h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width: 767px) {
            .team-boxed h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .team-boxed .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
        }

        .team-boxed .intro p {
            margin-bottom: 0;
        }

        .team-boxed .people {
            padding: 50px 0;
        }

        .team-boxed .item {
            text-align: center;

        }

        .team-boxed .item .box {
            text-align: center;
            padding: 30px;
            background-color: white;
            margin-bottom: 30px;
        }

        .team-boxed .item .name {
            font-weight: bold;
            margin-top: 28px;
            margin-bottom: 8px;
            color: inherit;
        }

        .team-boxed .item .title {
            text-transform: uppercase;
            font-weight: bold;
            color: #d0d0d0;
            letter-spacing: 2px;
            font-size: 13px;
        }

        .team-boxed .item .description {
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .team-boxed .item img {
            width: 300px;
            height: 400px;
        }

        .team-boxed .social {
            font-size: 18px;
            color: #a2a8ae;
        }

        .team-boxed .social a {
            color: inherit;
            margin: 0 10px;
            display: inline-block;
            opacity: 0.7;
        }

        .team-boxed .social a:hover {
            opacity: 1;
        }


    </style>
@endsection
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{ Breadcrumbs::render('course' , $course) }}
                    <hr>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                    <h1>
                        @if(app()->getLocale() == 'ar' )
                            {!! $course->ar_title !!}
                        @else
                            {!! $course->title !!}
                        @endif
                    </h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section>
        <div class="container">
            <div class="row">
                <article>

                    <img class="col-sm-12" alt="Pic" src="{{ asset('storage/' . $course->image_path) }}">

                    <p>
                        @if(app()->getLocale() == 'ar' )
                            {!! $course->ar_description !!}
                        @else
                            {!! $course->description !!}
                        @endif
                    </p>

                </article><br>
                @if(count($instructors) > 0)

                    <div class="team-boxed">
                        <div class="container">


                            <div class="intro">
                                <h2 class="text-center">{{ app()->getLocale() == 'ar' ? '  المدربين في الدورة' : 'Course\'s Instructors ' }} </h2>
                                <p class="text-center">{{ app()->getLocale() == 'ar' ? '  يسرنا أن نقدم لكم مدربين مؤهلين.' : 'We Glad to introduce you to our qualified Instructors .' }}</p>
                            </div>
                            <div class="row people">

                                <div class="row people">
                                    @foreach($instructors as $inst)

                                        <div class="col-md-6 col-lg-4 item">
                                            <div class="box">
                                                <img class="rounded-circle"
                                                     src="{{ asset('storage/' . $inst->image) }}">
                                                @if(app()->getLocale() == 'ar' )
                                                    {!! $inst->ar_title !!}
                                                @else
                                                    {!! $inst->title !!}
                                                @endif

                                                <p class="truncate description"
                                                   style="overflow:hidden;">
                                                    @if(app()->getLocale() == 'ar' )
                                                        {{strip_tags($inst->ar_description)}}
                                                    @else
                                                        {{strip_tags($inst->description)}}
                                                    @endif</p>

                                                <div class="social">
                                                    <a class="mx-auto" data-toggle="modal" data-target="#myModal"
                                                       data-name= {{$inst->description}} >{{ app()->getLocale() == 'ar' ? 'قراءة المزيد' : 'Read More' }}</a>
                                                </div>
                                                <br>

                                                <div class="social"><a href="{{$inst->email}}"><i
                                                                class="fa fa-instagram"></i>{{$inst->email}}</a></div>
                                                <br>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ app()->getLocale() == 'ar' ? 'شركة باسل صالح وشركاه' : 'BASSEL SALEH & CO' }}</h4>
                                </div>
                                <div class="modal-body">
                                    <p class="">{!! $inst->description  !!}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                        @endif
                        <hr>
                        <div class="text-center">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                                <span class="btn__text">
                                                   {{ app()->getLocale() == 'ar' ? 'تسجيل':'Register'}}
                                                </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--end of row-->
            </div>

            <!--end of container-->
    </section>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register in The Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('register_course') }}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    {{ method_field('POST') }}
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">First Name:</label>
                            <input type="text" class="form-control" name="first_name" required>
                            <input type="hidden" name="course_id" value="{{$course->id}}" id="course_id">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>


                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>


                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Phone number</label><br>
                            <input type="text" class="form-control" name="phone_number" required>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Undergraduate Certificate</label><br>
                            <input type="file" class="form-control" name="under">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Postgraduate Certificate</label><br>
                            <input type="file" class="form-control" name="post">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Professional International
                                Certificate</label><br>
                            <input type="file" class="form-control" name="pro">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Work Expereince </label><br>
                            <textarea name="work_ex" class="form-control"></textarea>

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
                                <button type="submit" class="btn btn-primary" id="submit-button">Register</button>
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
        $(function () {
            $('.truncate').succinct({
                size: 200
            });
        });
    </script>

    <script>
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var desc = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            var des = modal.find('#desc').val(desc).scroll();
            des.te

        })
    </script>
@endsection