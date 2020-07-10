@extends('main.layouts.layout')
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{ Breadcrumbs::render('about') }}
                </div>
            </div>
            <hr>
            <!--end of row-->
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>
                        @lang('about.who_we_are')
                        <br class="hidden-xs">
                    </h2>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="section-about-history">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <img alt="Image" src="/main/images/about.png">
                </div>
            </div>
            <!--end of row-->
            <div class="row">

                <div class="col-sm-12 text-center">
                    <p style="text-align: left">
                        @lang('about.who_we_are_detail1')
                    </p>
                    <blockquote style="padding-bottom:40px;">
                        @lang('about.who_we_are_detail2')
                    </blockquote>
                    <p style="text-align: left">
                        @lang('about.who_we_are_detail3')
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section class="section-team-large">
        <div class="container">
            <div class="row">
                <div class="icon-title">
                    <span class="h6">@lang('about.left_compass')</span>
                    <i class="icon-globe icon"></i>
                    <span class="h6">@lang('about.right_compass')</span>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="team-member team-member--large">
                    <div class="col-md-5 col-md-offset-1 col-sm-7 text-center">
                        <img alt="Image" src="/main/images/Mission.png" style="width:100% ; object-fit: cover">
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <h4 class="mission">@lang('about.our_mission')</h4>
                            <p class="mission">
                            @lang('about.our_mission_detail')
                        </p>

                    </div>
                </div>
                <!--end of large team member-->
                <div class="team-member team-member--large">
                    <div class="col-md-5 col-md-push-6 col-sm-7 text-center">
                        <img alt="Image" src="/main/images/Vission.png" style="width:100% ; object-fit: cover">
                    </div>
                    <div class="col-md-5 col-md-pull-6 col-sm-5 col-md-offset-2">
                        <h4>@lang('about.our_vision')</h4>

                        <p>
                            @lang('about.our_vision_detail')
                        </p>

                    </div>
                </div>
                <!--end of large team member-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <h3 style="text-align: center">{{ app()->getLocale() == 'ar' ? 'شركة باسل صالح وشركاه' : 'BASSEL SALEH & CO Partners' }}</h3>

    <section class="cta-text" >
        <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="team-member">
                            <div class="col-md-10 col-md-offset-1 col-sm-7 text-center">
                                {{--<img alt="Image" src="{{ asset("storage/" . $member->image_path) }}" style="object-fit: cover" width="768" height="1024">--}}
                                <img alt="Image" src="/new/basel.jpeg" style="height: 400px;">
                            </div>
                            <div class="col-md-12 col-sm-5 text-center"><br>
                                <h4>@lang('about.partnertitle1')</h4>
                                {{--<span class="team-member__role">Partner</span>--}}
                                <div class="container-fluid">
                                    <div class="row text-center">
                                        <div class="col-lg-12">

                                            <p class="text-center truncate description" style="text-align: justify">
                                                @lang('about.partner1')
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                                                            <span class="btn__text">
                                                               {{ app()->getLocale() == 'ar' ? 'قراءة المزيد' : 'Read More' }}
                                                            </span>
                                </button>

                            </div>
                        </div>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">@lang('about.partnertitle1')</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p class="">@lang('about.partner1')</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
        </div>
    <!--end of container-->
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        $("#nav").removeClass("nav--absolute nav--transparent bg--dark");
        $("#nav").addClass(' bg--primary');
    </script>
    <script>
        $(function(){
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