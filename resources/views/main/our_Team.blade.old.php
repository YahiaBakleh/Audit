@extends('main.layouts.layout')
@section('style')
    <style>
        .imag {
            position: relative;
            float: left;
            width:  300px;
            height: 400px;
            background-position: 50% 50%;
            background-repeat:   no-repeat;
            background-size:     cover;
        }

        @media all and (max-width: 767px) {
            .imag{
                padding-right: 30px;
                width:  200px;
                height: 300px;
            }
        }


        .team-boxed {
            color:#313437;
            background-color:#e9ebee;
        }

        .team-boxed p {
            color:#7d8285;
        }

        .team-boxed h2 {
            font-weight:bold;
            margin-bottom:40px;
            padding-top:40px;
            color:inherit;
        }

        @media (max-width:767px) {
            .team-boxed h2 {
                margin-bottom:25px;
                padding-top:25px;
                font-size:24px;
            }
        }

        .team-boxed .intro {
            font-size:16px;
            max-width:500px;
            margin:0 auto;
        }

        .team-boxed .intro p {
            margin-bottom:0;
        }

        .team-boxed .people {
            padding:50px 0;
        }

        .team-boxed .item {
            text-align:center;
        }

        .team-boxed .item .box {
            text-align:center;
            padding:30px;
            background-color:#e9ebee;
            margin-bottom:30px;
        }

        .team-boxed .item .name {
            font-weight:bold;
            margin-top:28px;
            margin-bottom:8px;
            color:inherit;
        }

        .team-boxed .item .title {
            text-transform:uppercase;
            font-weight:bold;
            color:#d0d0d0;
            letter-spacing:2px;
            font-size:13px;
        }

        .team-boxed .item .description {
            font-size:15px;
            margin-top:15px;
            margin-bottom:20px;
        }

        .team-boxed .item img {
            width:  300px;
            height: 400px;
        }

        .team-boxed .social {
            font-size:18px;
            color:#a2a8ae;
        }

        .team-boxed .social a {
            color:inherit;
            margin:0 10px;
            display:inline-block;
            opacity:0.7;
        }

        .team-boxed .social a:hover {
            opacity:1;
        }



    </style>
@endsection
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('website')}}">@lang('nav.home')</a>
                        </li>
                        <li>
                            <a href="#">@lang('nav.team')</a>
                        </li>

                    </ol>
                    <hr>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>
                        @lang('team.title')
                    </h2>
                </div>

            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section><br>
    @if(count($team_memebers) > 0)
    <section class="cta-text" >
        <div class="container">
            @foreach ($team_memebers as $team)
            <div class="row">
                <div class="team-member team-member--large">
                    <div class="col-md-5 col-sm-5">
                        <img alt="Image" class="imag" src="{{ asset('storage/' . $team->image_path) }}" style="">
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <h4>
                            @if(app()->getLocale() == 'ar' )
                                {!! $team->ar_title !!}
                            @else
                                {!! $team->title !!}
                            @endif
                            </h4>

                                    <p class="truncate description" style="overflow:hidden;">
                                        @if(app()->getLocale() == 'ar' )
                                            {{strip_tags($team->ar_description)}}
                                        @else
                                            {{strip_tags($team->description)}}
                                        @endif
                                        </p>



                                    <div class="social"><a href="{{$team->email}}"><i class="fa fa-instagram"></i>{{$team->email}}</a></div><br>

                        <div class="social">
                            <a  class="mx-auto" data-toggle="modal" data-target="#myModal" data-name =  >{{ app()->getLocale() == 'ar' ? 'قراءة المزيد' : 'Read More' }}</a>
                        </div><br>
                                </div>
                            </div>
                    </div>
                </div>

            <!--end of row-->
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">BASSEL SALEH & CO</h4>
                            </div>
                            <div class="modal-body">
                                <p class="">
                                    @if (app()->getLocale() == 'ar' )
                                    {!!$team->ar_description!!} @else  {!!$team->description!!}
                                        @endif
                                    </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
        <!--end of container-->
    </section>

    @endif

@endsection
@section('script')
    <script type="text/javascript">
        $( "#nav" ).removeClass( "nav--absolute nav--transparent bg--dark" );
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
            var description  = button.data('name');
            var d = modal.find('#des').val(description);
            var des = modal.find('#desc').val(desc).scroll();
            des.te

        })
    </script>
@endsection